<?php 
    
?>
<style>
    html, body, #map-canvas {
        height: 100%;
        margin: 0px;
        padding: 0px
    }
</style>

<!-- jQuery 1.10.2 - Google CDN -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<!-- jQuery UI 1.10.3 - Google CDN -->
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

<!-- Google Maps API v3 -->
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>

<script>
	$(document).ready(function(){
		var locations = [];
		// var addresses = ['Windsor, Canada'
		// 	, 'Manaus, Brazil'
		// 	, 'Sao Paulo, Brazil'
		// 	, 'Porto Alegre, Brazil'
		// 	, 'Shanghai, China'
		// 	, 'Tianjin, China'
		// 	, 'Beijing, China'];

		// var addresses = ['St. Petersburg, Russia'
		// 	, 'Moscow, Russia'
		// 	, 'Frankfurt, Germany'
		// 	, 'Berlin, Germany'
		// 	, 'Munich, Germany'
		// 	, 'Nassau, Bahamas'
		// 	, 'Roatan, Honduras'];

		var addresses = ['Freiburg, Germany'];
    
		var geocoder = new google.maps.Geocoder(); 
		for (var i = 0; i < addresses.length; i++) {
			geocoder.geocode(
				{ address : addresses[i] }, 
				function(results, status)
				{
					if(status == google.maps.GeocoderStatus.OK) {
						latitude = results[0].geometry.location.lat();
						longitude = results[0].geometry.location.lng();

						locations.push([latitude, longitude]);
						console.log(latitude, longitude);

						if (i == addresses.length - 1) {
							initialize();
						}
					}
				}
			);
		}

		locations.push([42.3149367, -83.0363633]);
		locations.push([-3.1190275, -60.02173140000002]);
		locations.push([-23.5505199, -46.63330939999997]);
		locations.push([-30.0228841, -51.159449800000004]);
		locations.push([31.230416, 121.473701]);
		locations.push([39.084158, 117.20098299999995]);
		locations.push([39.90403, 116.40752599999996 ]);
		locations.push([59.9342802, 30.335098600000038]);
		locations.push([55.755826, 37.6173]);
		locations.push([50.1109221, 8.682126700000026]);
		locations.push([52.52000659999999, 13.404953999999975]);
		locations.push([25.06, -77.34500000000003]);
		locations.push([48.1351253, 11.581980599999952]);
		locations.push([16.3833333, -86.39999999999998 ]);

		function initialize() {
			var mapOptions = {
                zoom: 2,
                center: new google.maps.LatLng('36.1378747', '-5.3503418'),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            }
            var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
			setMarkers(map, locations);
		}

		function setMarkers(map, locations) {
            for (var i = 0; i < locations.length; i++) {
                var location = locations[i];
                var myLatLng = new google.maps.LatLng(location[0], location[1]);
                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map
                });
            }
        };

        google.maps.event.addDomListener(window, 'load', initialize);
	});
</script>

<html>
<body>
	<span id="spanResult"></span>
	<div id="map-canvas" style="width: 100%; height: 100%;"></div>
</body>
</html>