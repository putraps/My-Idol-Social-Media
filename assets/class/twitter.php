<?php 


class MyTwitterIdol{	
	private $url = "https://api.twitter.com/1.1/users/show.json";
	private $urlMyIdol = "https://twitter.com/";
	private $requestMethod = "GET";
	private $getfield = '?screen_name=';
	private $twitter;
	private $myIdol;
	
	public function __construct(){
		require_once('TwitterAPIExchange.php');
		include "/../config/auth.php";
		include "/../config/idol.php";
		
		$this->getfield = $this->getfield.$myIdolUsername;
		$twitter = new TwitterAPIExchange($oAuthTwitter);
		$obj = json_decode($twitter->setGetfield($this->getfield )
			->buildOauth($this->url, $this->requestMethod)
			->performRequest(),$assoc = TRUE);	
		$this->myIdol = $obj;
		$this->urlMyIdol = $this->urlMyIdol.$myIdolUsername;
	}
	
	public function getFollowersMyIdol(){
		$followers=$this->myIdol['followers_count'];

		if($followers < 1000){
			return $followers;
		}
		else if($followers < 1000000){
			$followers = $followers / 1000;
			$followers= round( $followers, 2, PHP_ROUND_HALF_ODD)."K";
			return $followers;
		}
		else{
			$followers = $followers / 1000000;
			$followers= round( $followers, 2, PHP_ROUND_HALF_ODD)."M";
			return $followers;
		}
	}
	
	public function getURLProfilePicture(){
		return $this->myIdol['profile_image_url'];
	}
	
	public function getURLMyIdol(){
		return $this->urlMyIdol;
	}
} 
 
/**/
		
?>

