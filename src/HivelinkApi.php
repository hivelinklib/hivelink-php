<?php

namespace Hivelink;

use Hivelink\Exceptions\ApiException;
use Hivelink\Exceptions\HttpException;
use Hivelink\Exceptions\RuntimeException;
use Hivelink\Enums\ApiLogs ;
use Hivelink\Enums\General;

class HivelinkApi
{
    const APIPATH = "%s://notif.hivelink.co/api/v1/%s/%s/%s/%s";
    const VERSION = "1.0";
    public function __construct($apiKey,$insecure=true)
    {
        if (!extension_loaded('curl')) {
            die('cURL library is not loaded');
            exit;
        }
        if (is_null($apiKey)) {
            die('apiKey is empty');
            exit;
        }
        $this->apiKey = trim($apiKey);
        $this->insecure = $insecure;
    }   
    
	protected function get_path($method, $base = 'sms')
    {
        return sprintf(self::APIPATH,$this->insecure==true ? "http": "https", $this->apiKey, $base, $method);
    }
	
	protected function execute($url, $data = null)
    {        
        $handle = curl_init($url);
        $payload = json_encode($data);
        curl_setopt($handle, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($handle, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $response     = curl_exec($handle);

        $code         = curl_getinfo($handle, CURLINFO_HTTP_CODE);
        $content_type = curl_getinfo($handle, CURLINFO_CONTENT_TYPE);
        $curl_errno   = curl_errno($handle);
        $curl_error   = curl_error($handle);
        if ($curl_errno) {
            throw new HttpException($curl_error, $curl_errno);
        }
        $json_response = json_decode($response);
        if ($code != 200 && is_null($json_response)) {
            throw new HttpException("Request have errors", $code);
        } else {
            if ($json_response->status->code != 200) {
                throw new ApiException($json_response->status->message, $json_response->status->code);
            }
            return $json_response->entries;
        }
        
    }
    	
    public function SendSimple($line_number, $receiver, $message, $date = null)
    {
        if (is_array($receiver)) {
            $receiver = implode(",", $receiver);
        }

        $path   = $this->get_path("sms","send","simple");
        $params = array(
            "receiver" => $receiver,
            "line_number" => $line_number,
            "text" => $message,
            "date" => $date,
        );
        return $this->execute($path, $params);
    }

    public function SendBulk($line_number, $receiver, $message, $date = null)
    {
        if (is_array($receiver)) {
            $receiver = implode(",", $receiver);
        }

        $path   = $this->get_path("sms","send","bulk");
        $params = array(
            "receiver" => $receiver,
            "line_number" => $line_number,
            "text" => $message,
            "date" => $date,
        );
        return $this->execute($path, $params);
    }
	
    public function Status($messageid)
    {
        $path = $this->get_path("sms","delivery","status");
		$params = array(
            "reference_id" => $messageid
        );
		
		// or get all status for bulk sms with batch id
		// "batch_id": 345436546776
	
        return $this->execute($path,$params);      
    }

    public function getCredit()
    {
        $path = $this->get_path("account","wallet",'balanced');
        return $this->execute($path);
    } 
    

?>