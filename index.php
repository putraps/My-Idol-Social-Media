<?php
	include 'assets/class/twitter.php';
	include 'assets/class/facebook.php';
	
	$twitterIdol = new MyTwitterIdol();
	$facebookIdol = new MyFacebookIdol();

	echo $facebookIdol->getLikePageMyIdol()."<br>";
	echo $twitterIdol->getFollowersMyIdol()."<br>";
	echo $twitterIdol->getURLProfilePicture()."<br>";
?>