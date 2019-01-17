
<?php


include 'footer.html';

session_start();

if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] == true)
	

	{
		#echo "Welcome " . $_SESSION['username'];
		#echo "<html> <button onclick = \"window.location.href='logout.php'\"> Logout </button> </html>";
		include 'navbar.php';		
		
		
		
		

	}

else
{
 header("Location: login.php"); 
}


?>