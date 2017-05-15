<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$location = filter_input(INPUT_POST, 'location');
		$message = wordwrap(filter_input(INPUT_POST, 'message'), 70);

		// Write submitted location to storage.
		$locations_file = fopen("reach.txt", "ab");
		$info_json = json_encode($location);
		fwrite($locations_file, $info_json . "\n");
		fclose("reach.txt");

		// Send email message to creator if the field wasn't left empty.
		if (strlen($message) > 0)
		{
			mail("maxpung@gmail.com", "Message from LoveIsEverywhere finder", $message);
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhmtl1/DTD/xhtml1-transitional.dtd">

<html>
	<head>
		<meta charset = "utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>	<!-- tell browser to adjust dimensions & scaling to width of device -->
		<meta name="description" content="This page documents the journey of a electronic project that hopefully delivers positivity to people."/>
		<title>Love Is Everywhere</title>
		<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
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
				<a href="#about" class="w3-btn-block w3-hover-white">ABOUT</a>
			</div>
			<div class="w3-col s4">
				<a href="https://github.com/GnUfTw/Love-Is-Everywhere" class="w3-btn-block w3-hover-white">GITHUB</a>
			</div>
		</div>
	</div>
<?php
	$locations_file = fopen("reach.txt", "r");

	$locations = array();
	while(!feof($locations_file))
	{
		$location_json = fgets($locations_file);
		$location = json_decode($location_json, true);
		$locations[] = $location;
	}
	fclose($locations_file);
?>
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
			<p>The purpose of this project is to spread positivity across this lovely planet by reminding us that love is anywhere and everywhere. This project is for you. It is for the one having a rough day and for the one ready to pass the good vibes on.</p>
			<p>I hope you enjoy the kind words and I hope you spread the love.</p>
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
	
	<!-- Found Locations Table Container -->
<?php

?>
	</div>	<!-- End page content -->
	<footer class="w3-center w3-light-grey w3-padding-48 w3-large">
		<p>Created by Maxwell Pung</p>
	</footer>
	<script type="text/javascript">
	function initMap() 
	{
    		// Construct map
		map = new google.maps.Map(document.getElementById('map'), { 
        		center: {lat: 45.01246569999999, lng: -92.99188279999998},
        		zoom: 11
    		});
		
		/*var locations = <?= $locations; ?>
		var geocoder = new google.maps.Geocoder();

		for (index = 0; index < locations.length; index++)
		{
			var address = locations[index];
			geocoder.geocode({'address': address}, function(results, status){
				if (status === 'OK')
				{
					map.setCenter(results[0].geometry.location);
					var marker = new google.maps.Marker({
						map: map,
						position: results[0].geometry.location
					});
				}
		}*/
	}
	</script>
	<script async
        	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAZmG5HzKfNp-9Wq51UUkk2jXFkeC5sJ54&libraries=places&callback=initMap">
       	</script>

	</body>
</html>
