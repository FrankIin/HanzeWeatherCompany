
<?php


include 'footer.html';

session_start();

if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] == true)
	

	{
		include 'navbar_home.php';		
		include 'gmap.php';
		
		
	}

else
{
 header("Location: login.php"); 
}


?>
<html>



</html>