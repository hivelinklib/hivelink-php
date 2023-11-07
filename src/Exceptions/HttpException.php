<?php

namespace Hivelink\Exceptions;

class HttpException extends BaseRuntimeException
{
	public function getName()
    {
        return 'HttpException';
    }	
}

?>