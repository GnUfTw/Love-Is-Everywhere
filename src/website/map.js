var map;

function initMap() 
{
    	// Construct map.
	map = new google.maps.Map(document.getElementById('map'), { 
        	center: {lat: 45.01246569999999, lng: -92.99188279999998},	// Should be lat & lng of first drop in final design.
        	zoom: 10
    	});
	var geocoder = new google.maps.Geocoder();

	// Get list of locations.
	var locationDiv = document.getElementById("location-data");
	var obj = JSON.parse(locationDiv.textContent);
	
	// Display locations on map with a marker.
	for (i in obj) 
	{
		geocodeAddress(geocoder, map, obj[i]);
	}
}

function geocodeAddress(geocoder, map, address)
{
	geocoder.geocode({'address': address}, function(results, status){
		if (status === 'OK')
		{
			map.setCenter(results[0].geometry.location);
			var marker = new google.maps.Marker({
				map: map,
				position: results[0].geometry.location
			});
		}
		else
		{
			console.log('Geocode was not successful for the following reason: ' + status);
		}
	});
}
