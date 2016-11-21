<?php
require_once('assets/TwitterAPIExchange.php');
include "assets/auth.php";
 
$url = "https://api.twitter.com/1.1/users/show.json";
 
$requestMethod = "GET";
$getfield = '?screen_name=taylorswift13';
 
$twitter = new TwitterAPIExchange($auth);
$string = json_decode($twitter->setGetfield($getfield)
			->buildOauth($url, $requestMethod)
			->performRequest(),$assoc = TRUE);
			
echo "Profile Image: ".$string['profile_image_url']."<br />";
$followers=$string['followers_count'];

if($followers < 1000){
	echo "Followers : ".$followers."<br/>";
}
else if($followers < 1000000){
	$followers = $followers / 1000;
	$followers= round( $followers, 2, PHP_ROUND_HALF_ODD);
	echo "Followers : ".$followers."K"."<br/>";
}
else{
	$followers = $followers / 1000000;
	$followers= round( $followers, 2, PHP_ROUND_HALF_ODD);
	echo "Followers : ".$followers."M"."<br/>";
}

echo '<a class="twitter-timeline" href="https://twitter.com/taylorswift13"  data-width="500" data-chrome="nofooter noborders noheader noscrollbar">
		Tweets by taylorswift13</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>';
/*foreach($string as $items)
    {
        echo "Time and Date of Tweet: ".$items['created_at']."<br />";
        echo "Tweet: ". $items['text']."<br />";
        echo "Tweeted by: ". $items['user']['name']."<br />";
        echo "Screen name: ". $items['user']['screen_name']."<br />";
        echo "Followers: ". $items['user']['followers_count']."<br />";
        echo "Friends: ". $items['user']['friends_count']."<br />";
		echo "Profile Image: ".$items['user']['profile_image_url']."<br />";
        echo "Listed: ". $items['user']['listed_count']."<br /><hr />";
    }*/

?>

