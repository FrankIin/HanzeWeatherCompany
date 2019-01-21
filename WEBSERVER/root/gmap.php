<!DOCTYPE html>

<html>

<head>
<title> Learning Google Map </title>

<style>
#map
{

height: 400px;
width:50%;
position: relative;
left: 5px;
border: 3px solid #73AD21;
  
}




</style>





</head>

<body>

<h1> </h1>

<div id = "map"> </div>


<script>

function initMap()

{
	
	var options = 
	{
		
		zoom: 5, center: {lat:34.553127, lng: 18.048012}
		
	}
	
	// create a map
	var map = new google.maps.Map(document.getElementById('map'), options);
	
	//add a marker
	var marker = new google.maps.Marker({position: {lat:37.983810 , lng:23.727539 }, map:map   });
	//add info to the marker
	var infoWindow = new google.maps.InfoWindow( {content: '<b>Athens</b> <br> 10 &#176;'} );
	
	//add actions to the marker
	marker.addListener ('click', function() {infoWindow.open(map, marker);});
	
	
	
	
	
	
	
	
}

</script>





<script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
  type="text/javascript"></script>

</body>
</html>










