<?php

session_start();

if (!isset($_SESSION['logged-in']))

{header("Location: login.php");
}

else
	
{
	
include 'footer.html'; 



include 'navbar_home.php';


}
 ?>







<html>



<head>


<body>


<?php if($_GET['country'] == 'Europe' || $_GET['country'] == 'Mediterranean')
{
echo "<div id='myChart'></div>"; 
}

else

{
	
echo ' <h1 style="text-align:center;"> Historical View </h1>';
echo "<div class = 'center'> <div id='avgtmp'></div>
<div id='avghmd'></div> </div>"; 
}
?>

<!--<button class='button' onclick ="window.location.href='/index.php'"> Back </button> -->
<!--<button class='button'> <a href = "/" download = "users.sql"> Download </button> -->
<!--<a href = "/" download = "users.sql"> <button class = 'button'> Download </button> -->

<button class = 'button' onclick = "download(vals_avgtmp,'<?php echo $_GET['country'] . '(temps).csv' ?>'); download(vals_avghmd,'<?php echo $_GET['country'] . '(humd).csv' ?>')"> Download </button>

</body>


<style>

#myChart

{
	
	height: 75%;
	width: 90%;
	position: absolute;
	left: 5%;
	
}

.center

{
	position: absolute;
	
	left: 18%;
}




#avgtmp, #avghmd

{
	
	display: inline-block;
	margin: auto;
	
}

.button
{
	background-color: #4CAF50;
	border: none;
	color: white;
	padding: 15px 30px;
	text-align: center;
	text-decoration: none;
	#display: inline-block;
	font-size: 18px;
	
	position: absolute;
	left: 50%;
	top: 85%;
	
}

.button:hover

{
	  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);

}


</style>


<script src= "https://cdn.zingchart.com/zingchart.min.js"></script>

<script> zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
		ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9","ee6b7db5b51705a13dc2339db3edaf6d"];</script>

</head>

<?php
$country = $_GET['country'];
?>


<script>

function download(data, filename, type) {
    var file = new Blob([data], {type: type});
    if (window.navigator.msSaveOrOpenBlob) // IE10+
        window.navigator.msSaveOrOpenBlob(file, filename);
    else { // Others
        var a = document.createElement("a"),
                url = URL.createObjectURL(file);
        a.href = url;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        setTimeout(function() {
            document.body.removeChild(a);
            window.URL.revokeObjectURL(url);  
        }, 0); 
    }
}





//Generate Random Values
function GenRandInt(min, max, how_many) 
{
  IntArray = [];
  
  var i;
  
  for (i = 0; i < how_many; i++)
	  
	  {
		  
  currentNum = Math.floor(Math.random() * (max - min + 1) ) + min;
  IntArray.push(currentNum);
		  
	  }
	  
  return IntArray;
}


var vals_avgtmp = GenRandInt(0,20,24);
var vals_avghmd = GenRandInt(60,99,24);	

var country = "<?php echo $country ?>";

var histView = {
	
  "type": "area",
  "title": {
  "text": "Average Temps (" + country + ")",
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
    
	{"values": vals_avgtmp},
	//values 1
      //{"values": [5,3,2,1,3,4,2,3,7,6,4,8,13,10,12,15,17,13,11,12,12,10,6,4]},
	//values 2
	//{"values": [1,2,3,4,5,6,5,4,7,5,6,5,4,5,7,3,1,2,3,2,2,3,1,2]}
	
  ],
  
  "labels": [
  
   {//label1
    //"text" : "* the color blue",
	"font-color" : "blue",
	//"font-family" : "Arial",
	//"font-size" : "13",
	//"x" : "5%",
	//"y" : "90%"
	}
	,
	
	{//label2
    //"text" : "* the color red",
	//"font-color" : "red",
	//"font-family" : "Arial",
	//"font-size" : "13",
	//"x" : "5%",
	//"y" : "94%"	
	}
,
	
	{//label3
    //"text" : "Hour",
	//"font-color" : "red",
	//"font-family" : "Arial",
	//"font-size" : "15",
	//"x" : "50%",
	//"y" : "95%"	
	}
,
	
	{//label4
    //"text" : "Temperature",
	//"font-color" : "red",
	//"font-family" : "Arial",
	//"font-size" : "15",
	//"x" : "1%",
	//"y" : "3%"	
	}
	
  ]
  
};

var avgtmp = {
	
  "type": "area",
  "title": {
  "text": "Average Temperature (" + country + ")",
    "fontSize": 18
  },
  "subtitle": {
    "text": "in C"
  },
  "plot": {
	  //"line-color": "green",
	  "background-color" : "green",
    "animation": {
      "delay": "100",
      "effect": "4",
      "method": "5",
      "sequence": "1"
    }
  },
  "series": [
    //values 1
	
      {"values": GenRandInt(0,25,24)},
	//values 2
	//{"values": [1,2,3,4,5,6,5,4,7,5,6,5,4,5,7,3,1,2,3,2,2,3,1,2]}
	
  ],
  
  "labels": [
  
   {//label1
    //"text" : "* the color blue",
	"font-color" : "blue",
	//"font-family" : "Arial",
	"font-size" : "13",
	"x" : "5%",
	"y" : "90%"
	}
	,
	
	{//label2
    //"text" : "* the color red",
	"font-color" : "red",
	//"font-family" : "Arial",
	"font-size" : "13",
	"x" : "5%",
	"y" : "94%"	
	}
,
	
	{//label3
    //"text" : "Hour",
	//"font-color" : "red",
	//"font-family" : "Arial",
	//"font-size" : "15",
	//"x" : "50%",
	//"y" : "95%"	
	}
,
	
	{//label4
    //"text" : "Temperature",
	//"font-color" : "red",
	//"font-family" : "Arial",
	//"font-size" : "15",
	//"x" : "1%",
	//"y" : "3%"	
	}
	
  ]
  
};

var avghmd = {
	
  "type": "area",
  "title": {
  "text": "Average Humidity (" + country + ")",
    "fontSize": 18
  },
  
  "plot": {
	  //"line-color": "green",
	  "background-color" : "green",
    "animation": {
      "delay": "100",
      "effect": "4",
      "method": "5",
      "sequence": "1"
    }
  },
  "series": [
    //values 1
	
      {"values": vals_avghmd},
	//values 2
	//{"values": [1,2,3,4,5,6,5,4,7,5,6,5,4,5,7,3,1,2,3,2,2,3,1,2]}
	
  ],
  
  
  
};

 
 
 
 
 //render the chart

//var country = "<?php echo $country ?>";

if (country == "Europe")

{	
zingchart.render({ 
	id : 'myChart', 
	data : avgtmp, 
	height: "100%", 
	width: "100%" 
});

}


else if (country == "Mediterranean")

{
	
zingchart.render({ 
	id : 'myChart', 
	data : avghmd, 
	height: "100%", 
	width: "100%" 
});
	
	
	
	
	
}





else {

	
	zingchart.render({ 
	id : 'avgtmp', 
	data : histView, 
	height: "60%", 
	width: "60%"
	
});
	
zingchart.render({ 
	id : 'avghmd', 
	data : avghmd, 
	height: "60%", 
	width: "60%" 
});

}






</script>



</html>