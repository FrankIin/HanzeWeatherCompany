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










function initMap()

{
	
	var options = 
	{
		
		zoom: 5, center: {lat:34.553127, lng: 18.048012}
		
	}
	
	// create a map
	var map = new google.maps.Map(document.getElementById('map'), options);
		
	
	var markers = [];
	
	var country = [{lat: 42.546245, lng: 1.601554, link: 'avgtmp.php?country=Andorra'},
{lat: 23.424076, lng: 53.847818, link: 'avgtmp.php?country=United Arab Emirates'},
{lat: 33.93911, lng: 67.709953, link: 'avgtmp.php?country=Afghanistan'},
{lat: 17.060816, lng: -61.796428, link: 'avgtmp.php?country=Antigua and Barbuda'},
{lat: 18.220554, lng: -63.068615, link: 'avgtmp.php?country=Anguilla'},
{lat: 41.153332, lng: 20.168331, link: 'avgtmp.php?country=Albania'},
{lat: 40.069099, lng: 45.038189, link: 'avgtmp.php?country=Armenia'},
{lat: 12.226079, lng: -69.060087, link: 'avgtmp.php?country=Netherlands Antilles'},
{lat: -11.202692, lng: 17.873887, link: 'avgtmp.php?country=Angola'},
{lat: -75.250973, lng: -0.071389, link: 'avgtmp.php?country=Antarctica'},
{lat: -38.416097, lng: -63.616672, link: 'avgtmp.php?country=Argentina'},
{lat: -14.270972, lng: -170.132217, link: 'avgtmp.php?country=American Samoa'},
{lat: 47.516231, lng: 14.550072, link: 'avgtmp.php?country=Austria'},
{lat: -25.274398, lng: 133.775136, link: 'avgtmp.php?country=Australia'},
{lat: 12.52111, lng: -69.968338, link: 'avgtmp.php?country=Aruba'},
{lat: 40.143105, lng: 47.576927, link: 'avgtmp.php?country=Azerbaijan'},
{lat: 43.915886, lng: 17.679076, link: 'avgtmp.php?country=Bosnia and Herzegovina'},
{lat: 13.193887, lng: -59.543198, link: 'avgtmp.php?country=Barbados'},
{lat: 23.684994, lng: 90.356331, link: 'avgtmp.php?country=Bangladesh'},
{lat: 50.503887, lng: 4.469936, link: 'avgtmp.php?country=Belgium'},
{lat: 12.238333, lng: -1.561593, link: 'avgtmp.php?country=Burkina Faso'},
{lat: 42.733883, lng: 25.48583, link: 'avgtmp.php?country=Bulgaria'},
{lat: 25.930414, lng: 50.637772, link: 'avgtmp.php?country=Bahrain'},
{lat: -3.373056, lng: 29.918886, link: 'avgtmp.php?country=Burundi'},
{lat: 9.30769, lng: 2.315834, link: 'avgtmp.php?country=Benin'},
{lat: 32.321384, lng: -64.75737, link: 'avgtmp.php?country=Bermuda'},
{lat: 4.535277, lng: 114.727669, link: 'avgtmp.php?country=Brunei'},
{lat: -16.290154, lng: -63.588653, link: 'avgtmp.php?country=Bolivia'},
{lat: -14.235004, lng: -51.92528, link: 'avgtmp.php?country=Brazil'},
{lat: 25.03428, lng: -77.39628, link: 'avgtmp.php?country=Bahamas'},
{lat: 27.514162, lng: 90.433601, link: 'avgtmp.php?country=Bhutan'},
{lat: -54.423199, lng: 3.413194, link: 'avgtmp.php?country=Bouvet Island'},
{lat: -22.328474, lng: 24.684866, link: 'avgtmp.php?country=Botswana'},
{lat: 53.709807, lng: 27.953389, link: 'avgtmp.php?country=Belarus'},
{lat: 17.189877, lng: -88.49765, link: 'avgtmp.php?country=Belize'},
{lat: 56.130366, lng: -106.346771, link: 'avgtmp.php?country=Canada'},
{lat: -12.164165, lng: 96.870956, link: 'avgtmp.php?country=Cocos [Keeling] Islands'},
{lat: -4.038333, lng: 21.758664, link: 'avgtmp.php?country=Congo [DRC]'},
{lat: 6.611111, lng: 20.939444, link: 'avgtmp.php?country=Central African Republic'},
{lat: -0.228021, lng: 15.827659, link: 'avgtmp.php?country=Congo [Republic]'},
{lat: 46.818188, lng: 8.227512, link: 'avgtmp.php?country=Switzerland'},
{lat: 7.539989, lng: -5.54708, link: 'avgtmp.php?country=Cote d Ivoire'},
{lat: -21.236736, lng: -159.777671, link: 'avgtmp.php?country=Cook Islands'},
{lat: -35.675147, lng: -71.542969, link: 'avgtmp.php?country=Chile'},
{lat: 7.369722, lng: 12.354722, link: 'avgtmp.php?country=Cameroon'},
{lat: 35.86166, lng: 104.195397, link: 'avgtmp.php?country=China'},
{lat: 4.570868, lng: -74.297333, link: 'avgtmp.php?country=Colombia'},
{lat: 9.748917, lng: -83.753428, link: 'avgtmp.php?country=Costa Rica'},
{lat: 21.521757, lng: -77.781167, link: 'avgtmp.php?country=Cuba'},
{lat: 16.002082, lng: -24.013197, link: 'avgtmp.php?country=Cape Verde'},
{lat: -10.447525, lng: 105.690449, link: 'avgtmp.php?country=Christmas Island'},
{lat: 35.126413, lng: 33.429859, link: 'avgtmp.php?country=Cyprus'},
{lat: 49.817492, lng: 15.472962, link: 'avgtmp.php?country=Czech Republic'},
{lat: 51.165691, lng: 10.451526, link: 'avgtmp.php?country=Germany'},
{lat: 11.825138, lng: 42.590275, link: 'avgtmp.php?country=Djibouti'},
{lat: 56.26392, lng: 9.501785, link: 'avgtmp.php?country=Denmark'},
{lat: 15.414999, lng: -61.370976, link: 'avgtmp.php?country=Dominica'},
{lat: 18.735693, lng: -70.162651, link: 'avgtmp.php?country=Dominican Republic'},
{lat: 28.033886, lng: 1.659626, link: 'avgtmp.php?country=Algeria'},
{lat: -1.831239, lng: -78.183406, link: 'avgtmp.php?country=Ecuador'},
{lat: 58.595272, lng: 25.013607, link: 'avgtmp.php?country=Estonia'},
{lat: 26.820553, lng: 30.802498, link: 'avgtmp.php?country=Egypt'},
{lat: 24.215527, lng: -12.885834, link: 'avgtmp.php?country=Western Sahara'},
{lat: 15.179384, lng: 39.782334, link: 'avgtmp.php?country=Eritrea'},
{lat: 40.463667, lng: -3.74922, link: 'avgtmp.php?country=Spain'},
{lat: 9.145, lng: 40.489673, link: 'avgtmp.php?country=Ethiopia'},
{lat: 61.92411, lng: 25.748151, link: 'avgtmp.php?country=Finland'},
{lat: -16.578193, lng: 179.414413, link: 'avgtmp.php?country=Fiji'},
{lat: -51.796253, lng: -59.523613, link: 'avgtmp.php?country=Falkland Islands [Islas Malvinas]'},
{lat: 7.425554, lng: 150.550812, link: 'avgtmp.php?country=Micronesia'},
{lat: 61.892635, lng: -6.911806, link: 'avgtmp.php?country=Faroe Islands'},
{lat: 46.227638, lng: 2.213749, link: 'avgtmp.php?country=France'},
{lat: -0.803689, lng: 11.609444, link: 'avgtmp.php?country=Gabon'},
{lat: 55.378051, lng: -3.435973, link: 'avgtmp.php?country=United Kingdom'},
{lat: 12.262776, lng: -61.604171, link: 'avgtmp.php?country=Grenada'},
{lat: 42.315407, lng: 43.356892, link: 'avgtmp.php?country=Georgia'},
{lat: 3.933889, lng: -53.125782, link: 'avgtmp.php?country=French Guiana'},
{lat: 49.465691, lng: -2.585278, link: 'avgtmp.php?country=Guernsey'},
{lat: 7.946527, lng: -1.023194, link: 'avgtmp.php?country=Ghana'},
{lat: 36.137741, lng: -5.345374, link: 'avgtmp.php?country=Gibraltar'},
{lat: 71.706936, lng: -42.604303, link: 'avgtmp.php?country=Greenland'},
{lat: 13.443182, lng: -15.310139, link: 'avgtmp.php?country=Gambia'},
{lat: 9.945587, lng: -9.696645, link: 'avgtmp.php?country=Guinea'},
{lat: 16.995971, lng: -62.067641, link: 'avgtmp.php?country=Guadeloupe'},
{lat: 1.650801, lng: 10.267895, link: 'avgtmp.php?country=Equatorial Guinea'},
{lat: 39.074208, lng: 21.824312, link: 'avgtmp.php?country=Greece'},
{lat: -54.429579, lng: -36.587909, link: 'avgtmp.php?country=South Georgia and the South Sandwich Islands'},
{lat: 15.783471, lng: -90.230759, link: 'avgtmp.php?country=Guatemala'},
{lat: 13.444304, lng: 144.793731, link: 'avgtmp.php?country=Guam'},
{lat: 11.803749, lng: -15.180413, link: 'avgtmp.php?country=Guinea-Bissau'},
{lat: 4.860416, lng: -58.93018, link: 'avgtmp.php?country=Guyana'},
{lat: 31.354676, lng: 34.308825, link: 'avgtmp.php?country=Gaza Strip'},
{lat: 22.396428, lng: 114.109497, link: 'avgtmp.php?country=Hong Kong'},
{lat: -53.08181, lng: 73.504158, link: 'avgtmp.php?country=Heard Island and McDonald Islands'},
{lat: 15.199999, lng: -86.241905, link: 'avgtmp.php?country=Honduras'},
{lat: 45.1, lng: 15.2, link: 'avgtmp.php?country=Croatia'},
{lat: 18.971187, lng: -72.285215, link: 'avgtmp.php?country=Haiti'},
{lat: 47.162494, lng: 19.503304, link: 'avgtmp.php?country=Hungary'},
{lat: -0.789275, lng: 113.921327, link: 'avgtmp.php?country=Indonesia'},
{lat: 53.41291, lng: -8.24389, link: 'avgtmp.php?country=Ireland'},
{lat: 31.046051, lng: 34.851612, link: 'avgtmp.php?country=Israel'},
{lat: 54.236107, lng: -4.548056, link: 'avgtmp.php?country=Isle of Man'},
{lat: 20.593684, lng: 78.96288, link: 'avgtmp.php?country=India'},
{lat: -6.343194, lng: 71.876519, link: 'avgtmp.php?country=British Indian Ocean Territory'},
{lat: 33.223191, lng: 43.679291, link: 'avgtmp.php?country=Iraq'},
{lat: 32.427908, lng: 53.688046, link: 'avgtmp.php?country=Iran'},
{lat: 64.963051, lng: -19.020835, link: 'avgtmp.php?country=Iceland'},
{lat: 41.87194, lng: 12.56738, link: 'avgtmp.php?country=Italy'},
{lat: 49.214439, lng: -2.13125, link: 'avgtmp.php?country=Jersey'},
{lat: 18.109581, lng: -77.297508, link: 'avgtmp.php?country=Jamaica'},
{lat: 30.585164, lng: 36.238414, link: 'avgtmp.php?country=Jordan'},
{lat: 36.204824, lng: 138.252924, link: 'avgtmp.php?country=Japan'},
{lat: -0.023559, lng: 37.906193, link: 'avgtmp.php?country=Kenya'},
{lat: 41.20438, lng: 74.766098, link: 'avgtmp.php?country=Kyrgyzstan'},
{lat: 12.565679, lng: 104.990963, link: 'avgtmp.php?country=Cambodia'},
{lat: -3.370417, lng: -168.734039, link: 'avgtmp.php?country=Kiribati'},
{lat: -11.875001, lng: 43.872219, link: 'avgtmp.php?country=Comoros'},
{lat: 17.357822, lng: -62.782998, link: 'avgtmp.php?country=Saint Kitts and Nevis'},
{lat: 40.339852, lng: 127.510093, link: 'avgtmp.php?country=North Korea'},
{lat: 35.907757, lng: 127.766922, link: 'avgtmp.php?country=South Korea'},
{lat: 29.31166, lng: 47.481766, link: 'avgtmp.php?country=Kuwait'},
{lat: 19.513469, lng: -80.566956, link: 'avgtmp.php?country=Cayman Islands'},
{lat: 48.019573, lng: 66.923684, link: 'avgtmp.php?country=Kazakhstan'},
{lat: 19.85627, lng: 102.495496, link: 'avgtmp.php?country=Laos'},
{lat: 33.854721, lng: 35.862285, link: 'avgtmp.php?country=Lebanon'},
{lat: 13.909444, lng: -60.978893, link: 'avgtmp.php?country=Saint Lucia'},
{lat: 47.166, lng: 9.555373, link: 'avgtmp.php?country=Liechtenstein'},
{lat: 7.873054, lng: 80.771797, link: 'avgtmp.php?country=Sri Lanka'},
{lat: 6.428055, lng: -9.429499, link: 'avgtmp.php?country=Liberia'},
{lat: -29.609988, lng: 28.233608, link: 'avgtmp.php?country=Lesotho'},
{lat: 55.169438, lng: 23.881275, link: 'avgtmp.php?country=Lithuania'},
{lat: 49.815273, lng: 6.129583, link: 'avgtmp.php?country=Luxembourg'},
{lat: 56.879635, lng: 24.603189, link: 'avgtmp.php?country=Latvia'},
{lat: 26.3351, lng: 17.228331, link: 'avgtmp.php?country=Libya'},
{lat: 31.791702, lng: -7.09262, link: 'avgtmp.php?country=Morocco'},
{lat: 43.750298, lng: 7.412841, link: 'avgtmp.php?country=Monaco'},
{lat: 47.411631, lng: 28.369885, link: 'avgtmp.php?country=Moldova'},
{lat: 42.708678, lng: 19.37439, link: 'avgtmp.php?country=Montenegro'},
{lat: -18.766947, lng: 46.869107, link: 'avgtmp.php?country=Madagascar'},
{lat: 7.131474, lng: 171.184478, link: 'avgtmp.php?country=Marshall Islands'},
{lat: 41.608635, lng: 21.745275, link: 'avgtmp.php?country=Macedonia [FYROM]'},
{lat: 17.570692, lng: -3.996166, link: 'avgtmp.php?country=Mali'},
{lat: 21.913965, lng: 95.956223, link: 'avgtmp.php?country=Myanmar [Burma]'},
{lat: 46.862496, lng: 103.846656, link: 'avgtmp.php?country=Mongolia'},
{lat: 22.198745, lng: 113.543873, link: 'avgtmp.php?country=Macau'},
{lat: 17.33083, lng: 145.38469, link: 'avgtmp.php?country=Northern Mariana Islands'},
{lat: 14.641528, lng: -61.024174, link: 'avgtmp.php?country=Martinique'},
{lat: 21.00789, lng: -10.940835, link: 'avgtmp.php?country=Mauritania'},
{lat: 16.742498, lng: -62.187366, link: 'avgtmp.php?country=Montserrat'},
{lat: 35.937496, lng: 14.375416, link: 'avgtmp.php?country=Malta'},
{lat: -20.348404, lng: 57.552152, link: 'avgtmp.php?country=Mauritius'},
{lat: 3.202778, lng: 73.22068, link: 'avgtmp.php?country=Maldives'},
{lat: -13.254308, lng: 34.301525, link: 'avgtmp.php?country=Malawi'},
{lat: 23.634501, lng: -102.552784, link: 'avgtmp.php?country=Mexico'},
{lat: 4.210484, lng: 101.975766, link: 'avgtmp.php?country=Malaysia'},
{lat: -18.665695, lng: 35.529562, link: 'avgtmp.php?country=Mozambique'},
{lat: -22.95764, lng: 18.49041, link: 'avgtmp.php?country=Namibia'},
{lat: -20.904305, lng: 165.618042, link: 'avgtmp.php?country=New Caledonia'},
{lat: 17.607789, lng: 8.081666, link: 'avgtmp.php?country=Niger'},
{lat: -29.040835, lng: 167.954712, link: 'avgtmp.php?country=Norfolk Island'},
{lat: 9.081999, lng: 8.675277, link: 'avgtmp.php?country=Nigeria'},
{lat: 12.865416, lng: -85.207229, link: 'avgtmp.php?country=Nicaragua'},
{lat: 52.132633, lng: 5.291266, link: 'avgtmp.php?country=Netherlands'},
{lat: 60.472024, lng: 8.468946, link: 'avgtmp.php?country=Norway'},
{lat: 28.394857, lng: 84.124008, link: 'avgtmp.php?country=Nepal'},
{lat: -0.522778, lng: 166.931503, link: 'avgtmp.php?country=Nauru'},
{lat: -19.054445, lng: -169.867233, link: 'avgtmp.php?country=Niue'},
{lat: -40.900557, lng: 174.885971, link: 'avgtmp.php?country=New Zealand'},
{lat: 21.512583, lng: 55.923255, link: 'avgtmp.php?country=Oman'},
{lat: 8.537981, lng: -80.782127, link: 'avgtmp.php?country=Panama'},
{lat: -9.189967, lng: -75.015152, link: 'avgtmp.php?country=Peru'},
{lat: -17.679742, lng: -149.406843, link: 'avgtmp.php?country=French Polynesia'},
{lat: -6.314993, lng: 143.95555, link: 'avgtmp.php?country=Papua New Guinea'},
{lat: 12.879721, lng: 121.774017, link: 'avgtmp.php?country=Philippines'},
{lat: 30.375321, lng: 69.345116, link: 'avgtmp.php?country=Pakistan'},
{lat: 51.919438, lng: 19.145136, link: 'avgtmp.php?country=Poland'},
{lat: 46.941936, lng: -56.27111, link: 'avgtmp.php?country=Saint Pierre and Miquelon'},
{lat: -24.703615, lng: -127.439308, link: 'avgtmp.php?country=Pitcairn Islands'},
{lat: 18.220833, lng: -66.590149, link: 'avgtmp.php?country=Puerto Rico'},
{lat: 31.952162, lng: 35.233154, link: 'avgtmp.php?country=Palestinian Territories'},
{lat: 39.399872, lng: -8.224454, link: 'avgtmp.php?country=Portugal'},
{lat: 7.51498, lng: 134.58252, link: 'avgtmp.php?country=Palau'},
{lat: -23.442503, lng: -58.443832, link: 'avgtmp.php?country=Paraguay'},
{lat: 25.354826, lng: 51.183884, link: 'avgtmp.php?country=Qatar'},
{lat: -21.115141, lng: 55.536384, link: 'avgtmp.php?country=RÃ©union'},
{lat: 45.943161, lng: 24.96676, link: 'avgtmp.php?country=Romania'},
{lat: 44.016521, lng: 21.005859, link: 'avgtmp.php?country=Serbia'},
{lat: 61.52401, lng: 105.318756, link: 'avgtmp.php?country=Russia'},
{lat: -1.940278, lng: 29.873888, link: 'avgtmp.php?country=Rwanda'},
{lat: 23.885942, lng: 45.079162, link: 'avgtmp.php?country=Saudi Arabia'},
{lat: -9.64571, lng: 160.156194, link: 'avgtmp.php?country=Solomon Islands'},
{lat: -4.679574, lng: 55.491977, link: 'avgtmp.php?country=Seychelles'},
{lat: 12.862807, lng: 30.217636, link: 'avgtmp.php?country=Sudan'},
{lat: 60.128161, lng: 18.643501, link: 'avgtmp.php?country=Sweden'},
{lat: 1.352083, lng: 103.819836, link: 'avgtmp.php?country=Singapore'},
{lat: -24.143474, lng: -10.030696, link: 'avgtmp.php?country=Saint Helena'},
{lat: 46.151241, lng: 14.995463, link: 'avgtmp.php?country=Slovenia'},
{lat: 77.553604, lng: 23.670272, link: 'avgtmp.php?country=Svalbard and Jan Mayen'},
{lat: 48.669026, lng: 19.699024, link: 'avgtmp.php?country=Slovakia'},
{lat: 8.460555, lng: -11.779889, link: 'avgtmp.php?country=Sierra Leone'},
{lat: 43.94236, lng: 12.457777, link: 'avgtmp.php?country=San Marino'},
{lat: 14.497401, lng: -14.452362, link: 'avgtmp.php?country=Senegal'},
{lat: 5.152149, lng: 46.199616, link: 'avgtmp.php?country=Somalia'},
{lat: 3.919305, lng: -56.027783, link: 'avgtmp.php?country=Suriname'},
{lat: 0.18636, lng: 6.613081, link: 'avgtmp.php?country=SÃ£o TomÃ© and PrÃ­ncipe'},
{lat: 13.794185, lng: -88.89653, link: 'avgtmp.php?country=El Salvador'},
{lat: 34.802075, lng: 38.996815, link: 'avgtmp.php?country=Syria'},
{lat: -26.522503, lng: 31.465866, link: 'avgtmp.php?country=Swaziland'},
{lat: 21.694025, lng: -71.797928, link: 'avgtmp.php?country=Turks and Caicos Islands'},
{lat: 15.454166, lng: 18.732207, link: 'avgtmp.php?country=Chad'},
{lat: -49.280366, lng: 69.348557, link: 'avgtmp.php?country=French Southern Territories'},
{lat: 8.619543, lng: 0.824782, link: 'avgtmp.php?country=Togo'},
{lat: 15.870032, lng: 100.992541, link: 'avgtmp.php?country=Thailand'},
{lat: 38.861034, lng: 71.276093, link: 'avgtmp.php?country=Tajikistan'},
{lat: -8.967363, lng: -171.855881, link: 'avgtmp.php?country=Tokelau'},
{lat: -8.874217, lng: 125.727539, link: 'avgtmp.php?country=Timor-Leste'},
{lat: 38.969719, lng: 59.556278, link: 'avgtmp.php?country=Turkmenistan'},
{lat: 33.886917, lng: 9.537499, link: 'avgtmp.php?country=Tunisia'},
{lat: -21.178986, lng: -175.198242, link: 'avgtmp.php?country=Tonga'},
{lat: 38.963745, lng: 35.243322, link: 'avgtmp.php?country=Turkey'},
{lat: 10.691803, lng: -61.222503, link: 'avgtmp.php?country=Trinidad and Tobago'},
{lat: -7.109535, lng: 177.64933, link: 'avgtmp.php?country=Tuvalu'},
{lat: 23.69781, lng: 120.960515, link: 'avgtmp.php?country=Taiwan'},
{lat: -6.369028, lng: 34.888822, link: 'avgtmp.php?country=Tanzania'},
{lat: 48.379433, lng: 31.16558, link: 'avgtmp.php?country=Ukraine'},
{lat: 1.373333, lng: 32.290275, link: 'avgtmp.php?country=Uganda'},
{lat: 37.09024, lng: -95.712891, link: 'avgtmp.php?country=United States'},
{lat: -32.522779, lng: -55.765835, link: 'avgtmp.php?country=Uruguay'},
{lat: 41.377491, lng: 64.585262, link: 'avgtmp.php?country=Uzbekistan'},
{lat: 41.902916, lng: 12.453389, link: 'avgtmp.php?country=Vatican City'},
{lat: 12.984305, lng: -61.287228, link: 'avgtmp.php?country=Saint Vincent and the Grenadines'},
{lat: 6.42375, lng: -66.58973, link: 'avgtmp.php?country=Venezuela'},
{lat: 18.420695, lng: -64.639968, link: 'avgtmp.php?country=British Virgin Islands'},
{lat: 18.335765, lng: -64.896335, link: 'avgtmp.php?country=U.S. Virgin Islands'},
{lat: 14.058324, lng: 108.277199, link: 'avgtmp.php?country=Vietnam'},
{lat: -15.376706, lng: 166.959158, link: 'avgtmp.php?country=Vanuatu'},
{lat: -13.768752, lng: -177.156097, link: 'avgtmp.php?country=Wallis and Futuna'},
{lat: -13.759029, lng: -172.104629, link: 'avgtmp.php?country=Samoa'},
{lat: 42.602636, lng: 20.902977, link: 'avgtmp.php?country=Kosovo'},
{lat: 15.552727, lng: 48.516388, link: 'avgtmp.php?country=Yemen'},
{lat: -12.8275, lng: 45.166244, link: 'avgtmp.php?country=Mayotte'},
{lat: -30.559482, lng: 22.937506, link: 'avgtmp.php?country=South Africa'},
{lat: -13.133897, lng: 27.849332, link: 'avgtmp.php?country=Zambia'},
{lat: -19.015438, lng: 29.154857, link: 'avgtmp.php?country=Zimbabwe'}];

	for (var i = 0; i < country.length; i++)
		
		{ 
		markers[i] = new google.maps.Marker({
			
			
			position: new google.maps.LatLng(country[i].lat, country[i].lng),
			link: country[i].link,
			map:map
				
		}
		)
		}


	for (var i = 0; i < markers.length; i++)
		
		{
			
			google.maps.event.addListener(markers[i], 'click', function()
			
			{
				location.href = this.link;
			});
			
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










