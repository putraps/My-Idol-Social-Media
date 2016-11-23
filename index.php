<?php
	include 'assets/class/twitter.php';
	include 'assets/class/facebook.php';
	
	$twitterIdol = new MyTwitterIdol();
	$facebookIdol = new MyFacebookIdol();
	
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="assets/css/styles.css">
  <link href="assets/css/style.css" rel="stylesheet" type="text/css" media="all" /> 
  <link href="assets/css/jphotogrid.css" rel="stylesheet" type="text/css" media="screen" /> 
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
  <script src="assets/js/jphotogrid.js"></script>
  <script src="assets/jas/jflickrfeed.js"></script>
  <script src="assets/js/setup.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Idol Social Media</title>
</head>
<body>
	<div class="canvas1">
			<?php
				echo '<img src="https://pbs.twimg.com/profile_images/720767103712645122/6XEBAXLj.jpg" height=300px width=300px>';
			?>
			<h1>Taylor Swift</h1>
			<img src="assets/img/FBlogo.png" height=50px width=50px>
			<h3>Followers</h3>
			<?php
				echo "<p><b>".$facebookIdol->getLikePageMyIdol()."</b></p>";
			?>
			<img src="assets/img/TwitterLogo.png" height=50px width=50px>
			<h3>Followers</h3>
			<?php
				echo  "<p><b>".$twitterIdol->getFollowersMyIdol()."</b></p>";
			?>
	</div>
		
	<div class="canvas2"> 
			<h3 align=center>Timeline Twitter</h3>
			<?php
			echo '<a class="twitter-timeline" href="'.$twitterIdol->getURLMyIdol().'"  data-width="400" data-height=600 data-chrome="nofooter noborders noheader noscrollbar" style="padding:20px;">
					Tweets by taylorswift13</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>';
			?>
	</div>
		
	<div class="canvas3">
		<h3 align=center>Photo in Facebook</h3>
		<ul id="pg">
			<?php
				$temp = $facebookIdol->getAllProfilePictureMyIdol();
					for($i=0;$i<15;$i++){
						echo '<li>';
							echo '<img src="'.$temp[$i].'" />';
						echo '</li>';
					}
			?>
	</div>
</body>
</html>