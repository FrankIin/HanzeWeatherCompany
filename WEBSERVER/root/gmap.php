<!DOCTYPE html>

<html>

<head>
<title> Google Map </title>

<style>
#map
{

height: 400px;

position: relative;
left: 5px;
border: 3px solid #73AD21;
  
}

.info_window

{
line-height: 16pt;
}

.container
{
	width: 45%;
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

<?php include 'datagraph.php'; ?>


<script src = "https://cdn.zingchart.com/zingchart.min.js"></script>

<script>

function initMap()

{
	
	var options = 
	{
		
		zoom: 4, center: {lat:34.553127, lng: 18.048012}
		
	}
	
	// create a map
	var map = new google.maps.Map(document.getElementById('map'), options);
	
	
	var infoWindow = new google.maps.InfoWindow( {content: "<div class = 'info_window'><b>Athens</b><br> <b>21-01-2019 12:25pm</b><br> <b><i>Weather:</i></b> 10 &#176; <br> <b><i>Humidity:</i></b> 50% <br> <b><i>Wind speed:</i></b> 25km/hr </div>" } );
	
	
	marker = addMarker({lat:37.983810 , lng:23.727539 });
	
	addListener(marker);
	
	
	function addMarker(coords)
	
	{
		var marker = new google.maps.Marker({position: coords, map:map   });
		return marker;	
		
	}
	
	function addListener(marker)
	
	{
		marker.addListener('click', function() {zingchart.render({
  id: "myChart",
  data: avgtmp_eur,
  height: "420",
  width: "100%"
});});
		
	}


	
}


var avgtmp_eur = {
  "type": "area",
  "title": {
    "text": "Average Temperature in Europe",
    "fontSize": 18
  },
  "subtitle": {
    "text": "in C"
  },
  "plot": {
    "animation": {
      "delay": "100",
      "effect": "4",
      "method": "5",
      "sequence": "1"
    }
  },
  "series": [
    //values 1
      {"values": [5,3,2,1,3,4,2,3,7,6,4,8,13,10,12,15,17,13,11,12,12,10,6,4]},
	//values 2
	//{"values": [1,2,3,4,5,6,5,4,7,5,6,5,4,5,7,3,1,2,3,2,2,3,1,2]}
	
  ],
  
  "labels": [
  
   {//label1
    "text" : "* the color blue",
	"font-color" : "blue",
	//"font-family" : "Arial",
	"font-size" : "13",
	"x" : "5%",
	"y" : "90%"
	}
	,
	
	{//label2
    "text" : "* the color red",
	"font-color" : "red",
	//"font-family" : "Arial",
	"font-size" : "13",
	"x" : "5%",
	"y" : "94%"	
	}
,
	
	{//label3
    "text" : "Hour",
	//"font-color" : "red",
	//"font-family" : "Arial",
	"font-size" : "15",
	"x" : "50%",
	"y" : "90%"	
	}
,
	
	{//label4
    "text" : "Temperature",
	//"font-color" : "red",
	//"font-family" : "Arial",
	"font-size" : "15",
	"x" : "0%",
	"y" : "5%"	
	}
	
  ]
  
};




</script>






<script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
  type="text/javascript"></script>

</body>
</html>










