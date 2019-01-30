<!DOCTYPE html>

<html>

<head>
<title> Google Map </title>

<style>
#map
{

height: 600px;

position: relative;
left: 2%;
border: 3px solid #73AD21;
  
}

.info_window

{
line-height: 16pt;
}

.container
{
	width: 95%;
	position: fixed;
}


</style>





</head>

<body>

<h1> </h1>
<div class = "container">

<div id = "map"> </div>

<br>


</div>




<script>


function AvgTmpEur(controlDiv, map)

{
	
	
        // Set CSS for the control border.
        var controlUI = document.createElement('div');
        controlUI.style.backgroundColor = '#fff';
        controlUI.style.border = '2px solid #fff';
        controlUI.style.borderRadius = '3px';
        controlUI.style.boxShadow = '0 2px 6px rgba(0,0,0,.3)';
        controlUI.style.cursor = 'pointer';
        controlUI.style.marginBottom = '22px';
        controlUI.style.textAlign = 'center';
        controlUI.title = 'Click to view the Average Temp of the European Countries';
        controlDiv.appendChild(controlUI);

        // Set CSS for the control interior.
        var controlText = document.createElement('div');
        controlText.style.color = 'rgb(25,25,25)';
        controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
        controlText.style.fontSize = '16px';
        controlText.style.lineHeight = '38px';
        controlText.style.paddingLeft = '5px';
        controlText.style.paddingRight = '5px';
        controlText.innerHTML = 'Average Temperatures (Europe)';
        controlUI.appendChild(controlText);

        // Setup the click event listeners
        controlUI.addEventListener('click', function() {
          location.href = "avgtmp.php?country=Europe"});
	
	
	
	
	
	
	
	
	
}










function initMap()

{
	
	var options = 
	{
		
		zoom: 5, center: {lat:34.553127, lng: 18.048012}
		
	}
	
	// create a map
	var map = new google.maps.Map(document.getElementById('map'), options);
		
	
	marker = addMarker({lat:37.983810 , lng:23.727539 });
	
	addListener(marker);
	
	
	function addMarker(coords)
	
	{
		var marker = new google.maps.Marker({position: coords, map:map   });
		return marker;	
		
	}
	
	function addListener(marker)
	
	{
		marker.addListener('click', function() {location.href = "avgtmp.php?country=Athens"});
		
	}
	
var europe_div = document.createElement('div');
var europe_countries = new AvgTmpEur(europe_div,map);


	
europe_div.index = 1;


map.controls[google.maps.ControlPosition.TOP_CENTER].push(europe_div);

	
}






</script>






<script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
  type="text/javascript"></script>

</body>
</html>










