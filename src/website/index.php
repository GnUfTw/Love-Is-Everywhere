<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$location = filter_input(INPUT_POST, 'location');
		$key = "location";
		$message = wordwrap(filter_input(INPUT_POST, 'message'), 70);

		// Write submitted location to storage.
		$locations_json = json_decode(file_get_contents("reach.txt"), true);		
		$locations_json[] = $location;
		file_put_contents("reach.txt", json_encode($locations_json));

		// Send email message to creator if the field wasn't left empty.
		if (strlen($message) > 0)
		{
			mail("maxpung@gmail.com", "Message from LoveIsEverywhere finder", $message);
		}

		header("Location: " . $_SERVER['REQUEST_URI']);
		exit();
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhmtl1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
		<meta content="text/html;charset=utf-8" http-equiv="Content-Type"/>
		<meta charset = "utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>	<!-- tell browser to adjust dimensions & scaling to width of device -->
		<meta name="description" content="This page documents the journey of a electronic project that hopefully delivers positivity to people."/>
		<title>Love Is Everywhere</title>
		<!--<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">-->
		<link rel="stylesheet" href="w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
		<link rel="stylesheet" type="text/css" href="stylin.css">

	</head>
	<body>
	<!-- Links on top of page -->
	<div class="w3-top">
		<div class="w3-row w3-padding w3-black">
			<div class="w3-col s4">
				<a href="#" class="w3-btn-block w3-hover-white">HOME</a>
			</div>
			<div class="w3-col s4">
				<a href="#where" class="w3-btn-block w3-hover-white">MAP</a>
			</div>
			<div class="w3-col s4">
				<a href="https://github.com/GnUfTw/Love-Is-Everywhere" class="w3-btn-block w3-hover-white">GITHUB</a>
			</div>
		</div>
	</div>

	<!-- Header with image -->
	<header class="bgimg w3-display-container w3-grayscale-min" id="home">
		<div class="w3-display-bottomleft w3-center w3-padding-xlarge w3-hide-small">
			<span class="w3-tag">A Little Project For Humanity. This project is not been deployed yet and is still under development.</span>
		</div>
		<div class="w3-display-middle w3-center">
			<span class="w3-text-black" style="font-size:90px"><strong>Love<br>Is<br>Everywhere</strong></span>
		</div>
	</header>

	<!-- Add a background color & large text to the whole page -->
	<div class="w3-blue w3-grayscale w3-large">

	<!-- About Container -->
	<div class="w3-container" id="about">
		<div class="w3-content" style="max-width:700px">
			<h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide w3-padding-left w3-padding-right">ABOUT THE PROJECT</span></h5>
			<div class="w3-panel w3-leftbar w3-light-grey">
				<p><i>"Creativity is the greatest rebellion in existence."</i></p>
				<p>~ Osho</p>
			</div>
			<p>Yang is none without Yin. Much in the way that a battery cannot produce power without its polarities being properly oriented. Without both, life can seem less than whole. By embracing both, we give ourselves the support to move through life in a flow that resonates well with our inner world and our outer world.</p>
			<p>The purpose of this project is to spread positivity across this planet by reminding us that love is anywhere and everywhere. This project is for you. It is for the one having a rough day and for the one ready to pass the good vibes on.</p>
			<p> <i>A friendly reminder...you are loved and cared about, even on your darkest days. You are valued and the world needs you.</i></p>
			<p>I hope you enjoy the kind words and I hope you choose to spread the love, namaste.</p>
		</div>
	</div>

	<!-- Map/Location Submission Container -->
	<div class="w3-container" id="where" style="padding-bottom:32px;">
		<div class="w3-content" style="max-width:700px">
			<h5 class="w3-center w3-padding-48"><span class="w3-tag w3-wide w3-padding-left w3-padding-right">PROJECT REACH</span></h5>
			<p>Shown below are locations submitted by folks who found the box and (hopefully) passed it on.</p>
			<div id="map" style="width:100%;height:400px;"></div>
			<p><span class="w3-tag">Enter a new location!</span> Since you have found this box, it would be really cool if you take a moment to enter the location/address which you found it below. And if you want to drop me a message, feel free to do that too :)</p>
			<form name = "locationForm" method = "post">
				<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Location" required name="location"></p>
				<p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message the creator" name="message"></p>
				<p><button class="w3-btn w3-padding" type="submit">SUBMIT</button></p>
			</form>
		</div>
	</div>
	
	</div>	<!-- End page content -->

	<footer class="w3-center w3-light-grey w3-padding-48 w3-large">
		<p>This project is dedicated to friends passed</p>
		<p><b>R.I.P DT, NT, IA, and JH</b></p>
		<p>Created by Maxwell Pung</p>
	</footer>

	<!-- Make visited location data visible to use in js. -->
	<div id="location-data" style="display: none;">
		<?php
			echo file_get_contents("reach.txt");
		?>
	</div>

	<script type="text/javascript" src="map.js"></script>
	<script 
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZmG5HzKfNp-9Wq51UUkk2jXFkeC5sJ54&callback=initMap">
	</script>
	</body>
</html>
