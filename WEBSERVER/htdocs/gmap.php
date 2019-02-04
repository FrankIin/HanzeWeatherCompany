<?php

if (!isset($_SESSION['logged-in']))
	
	{
		header('Location: login.php'); 
    }
	
?>


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

<?php $_GET['country'] = "Greece" ?>



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


function AvgHumdMed(controlDiv, map)

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
        controlUI.title = 'Click to view the Average Humidity of the Mediterranean Countries';
        controlDiv.appendChild(controlUI);

        // Set CSS for the control interior.
        var controlText = document.createElement('div');
        controlText.style.color = 'rgb(25,25,25)';
        controlText.style.fontFamily = 'Roboto,Arial,sans-serif';
        controlText.style.fontSize = '16px';
        controlText.style.lineHeight = '38px';
        controlText.style.paddingLeft = '5px';
        controlText.style.paddingRight = '5px';
        controlText.innerHTML = 'Average Humidity (Mediterranean)';
        controlUI.appendChild(controlText);

        // Setup the click event listeners
        controlUI.addEventListener('click', function() {
          location.href = "avgtmp.php?country=Mediterranean"});
	
}







function initMap()

{
	
	var image = {url: '/blue_marker.png', scaledSize: new google.maps.Size(40,40)};
	
	var options = 
	{
		
		zoom: 5, center: {lat:34.553127, lng: 18.048012}
		
	}
	
	// create a map
	var map = new google.maps.Map(document.getElementById('map'), options);
		
	
	var markersEur = [];
	var markersMed = [];
	
	var icon = {blue: {icon: "/blue_marker.png"}};
	
	
	
	var countryMedit = [
	
	{lat: 40.463667, lng: -3.74922, link: 'avgtmp.php?country=Spain'},
	{lat: 46.227638, lng: 2.213749, link: 'avgtmp.php?country=France'},
	{lat: 43.750298, lng: 7.412841, link: 'avgtmp.php?country=Monaco'},
	{lat: 41.87194, lng: 12.56738, link: 'avgtmp.php?country=Italy'},
	{lat: 46.151241, lng: 14.995463, link: 'avgtmp.php?country=Slovenia'},
	{lat: 45.1, lng: 15.2, link: 'avgtmp.php?country=Croatia'},
	{lat: 43.915886, lng: 17.679076, link: 'avgtmp.php?country=Bosnia and Herzegovina'},
	{lat: 42.708678, lng: 19.37439, link: 'avgtmp.php?country=Montenegro'},
	{lat: 41.153332, lng: 20.168331, link: 'avgtmp.php?country=Albania'},
	{lat: 39.074208, lng: 21.824312, link: 'avgtmp.php?country=Greece'},
	{lat: 38.963745, lng: 35.243322, link: 'avgtmp.php?country=Turkey'},
	{lat: 34.802075, lng: 38.996815, link: 'avgtmp.php?country=Syria'},
	{lat: 33.854721, lng: 35.862285, link: 'avgtmp.php?country=Lebanon'},
	{lat: 31.046051, lng: 34.851612, link: 'avgtmp.php?country=Israel'},
	{lat: 26.820553, lng: 30.802498, link: 'avgtmp.php?country=Egypt'},
	{lat: 26.3351, lng: 17.228331, link: 'avgtmp.php?country=Libya'},
	{lat: 33.886917, lng: 9.537499, link: 'avgtmp.php?country=Tunisia'},
	{lat: 28.033886, lng: 1.659626, link: 'avgtmp.php?country=Algeria'},
	{lat: 31.791702, lng: -7.09262, link: 'avgtmp.php?country=Morocco'},
	{lat: 35.937496, lng: 14.375416, link: 'avgtmp.php?country=Malta'},
	{lat: 35.126413, lng: 33.429859, link: 'avgtmp.php?country=Cyprus'},
	];
	
	
	
	
	var country = [

{lat: 42.546245, lng: 1.601554, link: 'avgtmp.php?country=Andorra'},
{lat: 40.069099, lng: 45.038189, link: 'avgtmp.php?country=Armenia'},
{lat: 47.516231, lng: 14.550072, link: 'avgtmp.php?country=Austria'},
{lat: 40.143105, lng: 47.576927, link: 'avgtmp.php?country=Azerbaijan'},
{lat: 50.503887, lng: 4.469936, link: 'avgtmp.php?country=Belgium'},
{lat: 53.709807, lng: 27.953389, link: 'avgtmp.php?country=Belarus'},
{lat: 42.733883, lng: 25.48583, link: 'avgtmp.php?country=Bulgaria'},
{lat: 49.817492, lng: 15.472962, link: 'avgtmp.php?country=Czech Republic'},
{lat: 56.26392, lng: 9.501785, link: 'avgtmp.php?country=Denmark'},
{lat: 58.595272, lng: 25.013607, link: 'avgtmp.php?country=Estonia'},
{lat: 61.92411, lng: 25.748151, link: 'avgtmp.php?country=Finland'},
{lat: 42.315407, lng: 43.356892, link: 'avgtmp.php?country=Georgia'},
{lat: 51.165691, lng: 10.451526, link: 'avgtmp.php?country=Germany'},
{lat: 47.162494, lng: 19.503304, link: 'avgtmp.php?country=Hungary'},
{lat: 64.963051, lng: -19.020835, link: 'avgtmp.php?country=Iceland'},
{lat: 53.41291, lng: -8.24389, link: 'avgtmp.php?country=Ireland'},
{lat: 48.019573, lng: 66.923684, link: 'avgtmp.php?country=Kazakhstan'},
{lat: 42.602636, lng: 20.902977, link: 'avgtmp.php?country=Kosovo'},
{lat: 56.879635, lng: 24.603189, link: 'avgtmp.php?country=Latvia'},
{lat: 47.166, lng: 9.555373, link: 'avgtmp.php?country=Liechtenstein'},
{lat: 55.169438, lng: 23.881275, link: 'avgtmp.php?country=Lithuania'},
{lat: 49.815273, lng: 6.129583, link: 'avgtmp.php?country=Luxembourg'},
{lat: 41.608635, lng: 21.745275, link: 'avgtmp.php?country=Macedonia [FYROM]'},
{lat: 47.411631, lng: 28.369885, link: 'avgtmp.php?country=Moldova'},
{lat: 52.132633, lng: 5.291266, link: 'avgtmp.php?country=Netherlands'},
{lat: 60.472024, lng: 8.468946, link: 'avgtmp.php?country=Norway'},
{lat: 51.919438, lng: 19.145136, link: 'avgtmp.php?country=Poland'},
{lat: 39.399872, lng: -8.224454, link: 'avgtmp.php?country=Portugal'},
{lat: 45.943161, lng: 24.96676, link: 'avgtmp.php?country=Romania'},
{lat: 61.52401, lng: 105.318756, link: 'avgtmp.php?country=Russia'},
{lat: 43.94236, lng: 12.457777, link: 'avgtmp.php?country=San Marino'},
{lat: 44.016521, lng: 21.005859, link: 'avgtmp.php?country=Serbia'},
{lat: 48.669026, lng: 19.699024, link: 'avgtmp.php?country=Slovakia'},
{lat: 60.128161, lng: 18.643501, link: 'avgtmp.php?country=Sweden'},
{lat: 46.818188, lng: 8.227512, link: 'avgtmp.php?country=Switzerland'},
{lat: 48.379433, lng: 31.16558, link: 'avgtmp.php?country=Ukraine'},
{lat: 55.378051, lng: -3.435973, link: 'avgtmp.php?country=United Kingdom'},

];



	for (var i = 0; i < country.length; i++)
		
		{ 
		markersEur[i] = new google.maps.Marker({
			
			
			position: new google.maps.LatLng(country[i].lat, country[i].lng),
			link: country[i].link,
			map:map
			
				
		}
		)
		}
		
		
		
	for (var i = 0; i < countryMedit.length; i++)
		
		{ 
		markersMed[i] = new google.maps.Marker({
			
			
			position: new google.maps.LatLng(countryMedit[i].lat, countryMedit[i].lng),
			link: countryMedit[i].link,
			map:map,
			icon:image		
		}
		)
		}


	for (var i = 0; i < markersEur.length; i++)
		
		{
			
			google.maps.event.addListener(markersEur[i], 'click', function()
			
			{
				location.href = this.link;
			});
			
		}
		
		for (var i = 0; i < markersMed.length; i++)
		
		{
			
			google.maps.event.addListener(markersMed[i], 'click', function()
			
			{
				location.href = this.link;
			});
			
		}

var europe_div = document.createElement('div');
var europe_countries = new AvgTmpEur(europe_div,map);

var medt_div = document.createElement('div');
var medt_countries = new AvgHumdMed(medt_div,map);

	
europe_div.index = 1;
medt_div.index = 2;


map.controls[google.maps.ControlPosition.TOP_CENTER].push(europe_div);
map.controls[google.maps.ControlPosition.TOP_CENTER].push(medt_div);

	
}

</script>






<script async defer src="https://maps.googleapis.com/maps/api/js?key=&callback=initMap"
  type="text/javascript"></script>

</body>
</html>










