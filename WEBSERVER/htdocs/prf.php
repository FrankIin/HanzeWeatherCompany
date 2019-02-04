
<?php


include 'footer.html';

session_start();

if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] == true)
	

	{
		
		include 'navbar_prf.php';		
		
		
		
		
		
		
		

	}
else
{
 header("Location: login.php"); 
}


?>
<html>

<style>

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  position: relative;
  top: 5%;
  max-width: 300px;
  margin: auto;
  text-align: center;
  border: 3px solid #73AD21;

}

.title {
  color: grey;
  font-size: 18px;
}




</style>



<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<br>

<div class="card">
  <img src="blank_prf.jpg" alt="Blank Profile Pic" style="width:100%">
  <h1><?php echo $_SESSION['full_name']; ?></h1>
  <h3><?php echo $_SESSION['email']; ?> </h3>
  <p class="title">User</p>
  <p>Hanze University Groningen</p><br>
  
  
</div>




</html>