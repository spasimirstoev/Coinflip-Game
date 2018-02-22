<?php 
namespace App\MiddleWare;
use Yee\Libraries\Connectors\MemcachedConnector;


class RequestsPerSecondMiddleWare extends \Yee\Middleware
{
	
	public function call()
	{
		//$this->checkRequestsPerSecond();
		$this->next->call();
	}

	public function checkRequestsPerSecond()
	{
        $this->next->call();
       
	}
}