
<?php


include 'footer.html';

session_start();

if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] == true)
	

	{
		include 'navbar_home.php';		
		include 'gmap.php';
		echo '
		<br <br> <br>text text text text text text text text
		text text text text text text text text text text text text text text text text
		text text text text text text text text text text text text text text text text
		 text text text text text text text text text text text text text text text text 
		 text text text text text text text text text text text text text text text text';
		
		

	}

else
{
 header("Location: login.php"); 
}


?>