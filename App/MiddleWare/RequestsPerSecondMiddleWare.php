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
	{/*
		$app = $this->app;
		$memcache = $app->db['memcache'];

		$runtime = $memcache->get( 'floodControl' );
		var_dump($runtime);
		

		//use json array key is ip and treshold and hits are inside

  //       if ((time () - $runtime) < 30) {
          

  //          die ( "Die! Die! Die!" );
  //       } 

  //       else {
  //           echo "Welcome";
  //           $memcache->set ( "floodControl", time () );
  //       }
  //       die;
		// $ip = $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
		
		// $current = $memcache->increment($ip);

		// if($current == null) {

		//   // NOT_FOUND, so let's create it
		//   $memcache->set($ip,1); // <-- still risk of race-condition
		//   echo "Your the first!";

		// } else if ($current > 2 && (time () - $runtime) < 2) {

		//   echo "Hazah! Your under the limit.";

		// }else {
		
		//   echo "Ah Snap! No Luck";
		//   //If your worried about the value growing _too_ big, just drop the value down.
		//   $memcache_obj->decrement('count');

		// }
		$_SESSION['last_post'] = time();
        $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
        $setUserIp = $app->db['memcache']->set('hackerIp', $_SESSION['ip']);
        $setTimeRequestMade = $app->db['memcache']->set('hackerTime', $_SESSION['last_post']);

		$getUserIp = $app->db['memcache']->get('hackerIp');
		$getTimeRequestMade = $app->db['memcache']->get('hackerTime');

		$timestampMin =  time() - time() % 60;

		
		$ip = $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
		$hackerIp = $app->db['memcache']->set($ip , array(
			'userTimestamp' => $timestampMin,
			'usetHits' 		=> $userHits));
		
		$current = $memcache->increment($hackerIp);
		 
		if($current == null) {

		  // NOT_FOUND, so let's create it
		  $memcache->set($ip, array(
		  )); // <-- still risk of race-condition
		  echo "Your the first!";
		 
		}else if($current > 2 && (($getTimeRequestMade - $runtime) < 10)){
       		
        	var_dump($runtime);
	        if((time () - $runtime) < 10){
	          

	           die ( "Die! Die! Die!" );
	        }else {
	            echo "Welcome";
	            $memcache->set ( "floodControl", time () );
	        }*/
	
	    
        	$this->next->call();
        /* 
        }else{
        	$this->next->call();
        }*/
	}
}