<!DOCTYPE html>

<html>

<head>
<title> Learning Google Map </title>

<style>
#map
{height: 400px;
width:50%;

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
	
	
	var map = new google.maps.Map(document.getElementById('map'), options);
	
	
}

</script>





<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPk6hqSSg0aQodv34GS3xd8sxsYH0-s8I&callback=initMap"
  type="text/javascript"></script>

</body>
</html>










