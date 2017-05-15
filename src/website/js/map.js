var map;

function initMap() 
{
    	// Construct map
	map = new google.maps.Map(document.getElementById('map'), { 
        	center: {lat: 45.01246569999999, lng: -92.99188279999998},
        	zoom: 11
    	});

	var locations = JSON.parse('<?= $location_list; ?>');
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
	}

	// TODO: Get existing markers from JSON encoded file.
	// TODO: Construct markers.
	// TODO: Add click listeners for info windows (there should be 1 per marker).
	// TODO: Add click listener for submitted locations.
}    

//google.maps.event.addDomListener(window, 'load', initMap);

// TODO: Function for geocoding address.
// TODO: Function for performing search.
// TODO: Function for callback.
// TODO: Function for adding marker.
// TODO: Add event listeners for marker clicking.
