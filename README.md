<p align="center">  
  <a href="https://github.com/HiveLinkLib/hivelink-php">  
    <img src="logo.png" alt="Logo" height="200" alt="hivelink for php">  
  </a>  
  
  <h3 align="center">HiveLink Library Php</h3>  
  
  <p align="center">  
    Easy-to-use SDK for implementing Hivelink SMS API in your PHP projects.  
    <br />  
    <a href="https://notif.hivelink.co/docs"><strong>Explore the docs »</strong></a>  
    <br />  
  </p>  
</p>  
  
<br>  
<p align="center">

</p>
  
<p align="center">  
    <a href="#table-of-contents">English Document</a> | <a href="#table-of-contents-fa">مستندات فارسی</a>  
</p>  
  
<!-- TABLE OF CONTENTS -->  
## Table of Contents  
  
* [Install](#install)
* [Usage](#usage)  
  * [Parameters](#parameters)  
  * [Example](#example)  
* [One-Time Passwords (OTP)](#one-time-passwords-otp)  
  * [Parameters](#parameters-1)  
  * [Example](#example-1)  
* [Licence](#license)  
  
## Install  
  
The easiest way to install is by using [Composer](https://getcomposer.org/):  
  
```sh  
composer require hivelink/php  
```  
Composer is a dependency manager for PHP which allows you to declare the libraries your project depends on, and it will manage (install/update) them for you.  If you are not familiar with Composer, you can read its documentations and download it via [getcomposer.org](https://getcomposer.org/).

Alternatively you can download HiveLink SDK from [here](https://github.com/hivelinklib/hivelink-php/archive/master.zip) and extract it in your project and follow the rest of the instructions below. Also there is an `Example` folder inside the package which you can use to understand the procedure.
## usage  
    
To use the API, you need an API key. To get that you should have a [Hivelink](https://notif.hivelink.co) account. Register and get your API key.  
  
Then require the file autoload.php to get all classes and dependencies loaded.  
```php  
require __DIR__ . '/vendor/autoload.php';
```  
  
Create an instance from Hivelink class with your API key:  
  
```php  
$api = new \Hivelink\HivelinkApi( 'your_api_key');  
```  
Don't forget to change `your_api_key` with the key you have got from your Hivelink account.


Send a sms:  
```php  
$api->SendSimple(  
 "09xxxxxxxxx", // receiver
 "9000xxxxx", // choose a line number from your account
 "This is a test!Hivelink", // message
);  
```  
  
## Parameters  
| Parameter | Required | Description | Type | Example |  
| --- | --- | --- | --- | --- |  
| text| Yes | Text to be sent | string | Hello, World! |  
| receiver|  Yes | The number of the receiver(s) of the message (set all receiver in array). | string | 09110000000 |  
| line_number| No | If the sender's number is not specified, the message will be selected from Highlink's dedicated lines with higher priority.**```(If you have specified lines, enter the desired line```** | string | 9000**** |  
| date| No | The exact date and time of sending the message based on Unix time, if not specified, the message will be sent instantly. | string | 1671148877 |  
  
## Example  
Here is a sample code for sending an SMS. Please note that if you are looking for a specific line, you must specify the `line number`. 
```php  
require __DIR__ . '/vendor/autoload.php';
 
try{  
 $message = "This is a test!Hivelink";
 $lineNumber = null; // If you do not enter the line number, the message will be sent from the fastest HiveLink service line
 $receiver = "091xxxxxxxx"; // Use this method if sending to a mobile number
 $receiver = array("091********","092********"); // Use this method if sending to multiple mobile numbers
 $api = new \HiveLinkLib\HivelinkApi('api_key_developer');
 $api->SendSimple($lineNumber,$receiver,$message);  
}
catch(\HiveLinkLib\Exceptions\ApiException $e){  
 //If the response to the request is unsuccessful, this section will work
 echo $e->errorMessage();  
}  
catch(\HiveLinkLib\Exceptions\HttpException $e){  
 //If there is a problem in communicating with the HiveLink web service, this section will work
 echo $e->errorMessage();  
}  
```  
  
  
## License  
Freely distributable under the terms of the [MIT](https://opensource.org/licenses/MIT) license.  
  
<h2 dir="rtl" id="table-of-contents-fa">فهرست مطالب </h2>

<ul dir="rtl">
	<li><a href="#install-fa">نصب</a></li>
	<li><a href="#usage-fa">استفاده</a></li>
	<ul>
		<li><a href="#parameters-fa">پارامترها</a></li>
		<li><a href="#example-fa">نمونه کد</a></li>
	</ul>
	<li><a href="#otp-fa">رمز عبور یک‌بار مصرف</a></li>
	<ul>
		<li><a href="#parameters1-fa">پارامترها</a></li>
		<li><a href="#example1-fa">نمونه کد</a></li>
	</ul>
	<li><a href="#licence-fa">مجوز</a></li>
</ul>
  
<h2 dir="rtl" id="install-fa">نصب</h2>
<p dir="rtl">ساده‌ترین راه برای نصب این پکیج استفاده از Composer است:</p>  
  
```sh  
composer require hivelink/php
```  
<h2 dir="rtl" id="usage-fa"> نحوه استفاده </h2>

<p dir="rtl">برای استفاده از این پکیج می‌بایست API key داشته باشید. جهت دریافت ابتدا در <a href="https://`/">سامانه جامع هایولینک</a> ثبت‌نام کنید و از پنل کاربری‌تان API key دریافت کنید.</p>  
<p dir="rtl">سپس باید فایل autoload را به پروژه‌ی خود اضافه کنید:</p>  
  
```php  
require __DIR__ . '/vendor/autoload.php';
```  
<p dir="rtl">یک instance از کلاس <code>Hivelink</code> با API key خود بسازید:</p>
  
```php  
$api = new \Hivelink\HivelinkApi('your_api_key');  
```  
<p dir="rtl">به خاطر داشته باشید که <code>your_api_key</code> را با کلید دریافتی از حساب هایولینک خود جایگزین کنید.</p>  
 
<p dir="rtl"> پیامک دلخواه‌تان را ارسال کنید:</p>  
  
```php  
$api->SendSimple(  
 "09xxxxxxxxx", // گیرنده پیام
 "9000xxxxx", // انتخاب خط ارسال کننده پیام ، در صورت وارد نکردن از خط با سرعت بالا استفاده میشود!
 "This is a test!Hivelink", // message
); 
```  
  
<h2 dir="rtl" id="parameters-fa">پارامترها</h2>

<div class="table-wrapper"><table dir="rtl">
<thead>
<tr>
<th>پارامتر</th>
<th>اجباری</th>
<th>توضیحات</th>
<th>نوع</th>
<th>مثال</th>
</tr>
</thead>
<tbody>
<tr>
<td>text</td>
<td>بله</td>
<td>متنی که باید ارسال شود.</td>
<td>string</td>
<td>این یک تست می باشد!</td>
</tr>
<tr>
<td>receiver</td>
<td>بله</td>
<td>شماره گیرنده پیام می باشد.</td>
<td>string</td>
<td>09110000000</td>
</tr>
<tr>
<td>line_number</td>
<td>خیر</td>
<td>اگر شماره فرستنده مشخص نشده باشد، پیام از خطوط اختصاصی هایولینک با اولویت بالاتر انتخاب می شود.(در صورت داشتن خطوط مشخص، خط مورد نظر را وارد کنید)</td>
<td>string</td>
<td>9000***</td>
</tr>
<tr>
<td>date</td>
<td>خیر</td>
<td>تاریخ و زمان دقیق ارسال پیام بر اساس Unixtime می باشد که اگر قید نشود در همان لحظه پیام ارسال می شود.</td>
<td>string</td>
<td>1671147631</td>
</tr>
</tbody>
</table>
</div>
  
<h2 dir="rtl" id="example-fa">نمونه کد</h2>
<p dir="rtl"> در اینجا یک نمونه کد برای ارسال پیامک آورده شده است. لطفا توجه داشته باشید که اگر به دنبال یک خط خاص هستید، باید "شماره خط" را مشخص کنید.</p>
 
```php  
require __DIR__ . '/vendor/autoload.php';  
try{  
 $message = "این یک تست می باشد!هایولینک";
 $lineNumber = null; // اگر شماره خط را وارد نکنید، پیام از سریعترین خط سرویس هایولینک ارسال می شود
 $receiver = "091xxxxxxxx";
 $api = new \Hivelink\HivelinkApi('کلید توسعه دهنده');
 $api->SendSimple($lineNumber,&receiver,$message);  
}  
catch(\Hivelink\Exceptions\ApiException $e){ 
 //اگر پاسخ به درخواست ناموفق باشد، این بخش کار خواهد کرد
 echo $e->errorMessage();  
}  
catch(\Hivelink\Exceptions\HttpException $e){  
//در صورت بروز مشکل در برقراری ارتباط با وب سرویس هایولینک ، این قسمت کار می کند
 echo $e->errorMessage();  
}  
```  