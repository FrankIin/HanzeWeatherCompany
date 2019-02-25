<?php

  $file = file_get_contents("../../../../home/ITV2G01/GeneratorVerwerken/VirtualMachineRunner/src/" . $_GET['country'] . ".csv");
  $my_file = fopen("./temp/" .$_GET['country'].".csv","w");
  $headers = "Station_ID,temp,date,time,country,humidity \r\n";
  fwrite($my_file, $headers);
  fwrite($my_file,$file);
  
  fclose($my_file);

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



<!DOCTYPE html>
<html>
<meta http-equiv="Refresh" content="10">
 <head>
  <title>Weather Data</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
 
 <style>
 
 table {
  
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}


.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

.button:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

.center {
  margin: auto;
  width: 75%;
  
}

 </style>


    
	
    <br />
		<a href="/temp/<?php echo $_GET['country']; ?>.csv" ><div class = "center"><div class = "button">Download</div></div></a><br>
    <div id="weather_table">
    </div>

  
 

 </body>
 
 
 
 
</html>


<script>


(function update() {


 
  $.ajax({
   url:"temp/<?php echo $_GET['country'] . '.csv' ?>",
   dataType:"text",
   success:function(data)
   {
    var weather_data = data.split(/\r?\n|\r/);
    var table_data = '<table class="table table-bordered table-striped"><tr><th>Station ID</th><th>Temperature</th><th>Date</th><th>Time</th><th>Country</th><th>Humidity</th></tr>';
    if (weather_data.length < 3600)
		
		{
	for(var count = weather_data.length - 1; count >= 1; count--)
    {
     var cell_data = weather_data[count].split(",");
     table_data += '<tr>';
     for(var cell_count=0; cell_count<cell_data.length; cell_count++)
     {
       table_data += '<td>'+cell_data[cell_count]+'</td>';
     }
     table_data += '</tr>';
    }
	}
		
else
{	
	
	for(var count = weather_data.length - 1; count >= weather_data.length - 3600; count--)
    {
     var cell_data = weather_data[count].split(",");
     table_data += '<tr>';
     for(var cell_count=0; cell_count<cell_data.length; cell_count++)
     {
       table_data += '<td>'+cell_data[cell_count]+'</td>';
     }
     table_data += '</tr>';
    }
	
}
	
	
    table_data += '</table>';
    $('#weather_table').html(table_data);
   }
  }).then(function(){setTimeout(update, 60000);});
 
 


})();


</script>