<?php


class MyFacebookIdol{
	private $ver = 'v2.8/';
	private $hostname = 'https://graph.facebook.com/';
	private $access_token;
	private $crul;
	
	public function __construct(){
		include "/../config/auth.php";
		include "/../config/idol.php";
		
		$this->curl = curl_init();
        $url = $this->hostname.$this->ver.'oauth/access_token?'.$appIDFacebook;
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($this->curl);
        curl_close($this->curl);
        $obj = json_decode($response);
        $this->access_token = 'access_token='.$obj->{'access_token'};
	}
	
	public function getLikePageMyIdol(){
		include "/../config/idol.php";
		
		$this->curl = curl_init();
		$url = $this->hostname.$this->ver.$idolID.'/?fields=fan_count&'.$this->access_token;
		curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($this->curl);
        curl_close($this->curl);
        $fan_count = json_decode($response);
		$idolFollowers = $fan_count->{'fan_count'};
		
		if($idolFollowers < 1000){
			return $idolFollowers."<br/>";
		}
		else if($idolFollowers < 1000000){
			$idolFollowers = $idolFollowers / 1000;
			$idolFollowers = round( $idolFollowers, 2, PHP_ROUND_HALF_ODD)."K";
			return $idolFollowers;
		}
		else{
			$idolFollowers = $idolFollowers / 1000000;
			$idolFollowers = round( $idolFollowers, 2, PHP_ROUND_HALF_ODD)."M";
			return $idolFollowers;
		}
	}
	
	private function getAlbumProfilePictureMyIdol(){
		include "/../config/idol.php";
		
		$albumID;
		$this->curl = curl_init();
		$url = $hostname.$ver.$idolID.'/albums/?'.$access_token;
		curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($this->curl);
        curl_close($this->curl);
        $arrayOfAlbum = json_decode($response);
		
		foreach($arrayOfAlbum->data as $album){
			if($album->name == 'Profile Picture'){
				$albumID = $album->id;
				break;
			}
		}
		
		return $albumID;
	}
	
	public function getAllProfilePictureMyIdol(){
		include "/../config/idol.php";
		
		$this->curl = curl_init();
		$url = $hostname.$ver.$idolID.'/'.getAlbumProfilePictureMyIdol().'/photos/?fields=source&'.$access_token;
		curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($this->curl);
        curl_close($this->curl);
        $arrayOfPhoto = json_decode($response);
		$photos;
		$count=0;
		
		foreach($arrayOfPhoto->data as $photoURL){
			$photos[$count] = $photoURL->source;
			$count++;
		}
		
		return $photos;
	}
	
	
}
?>