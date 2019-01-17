<html>
<!-- include footer + import css -->
<?php include 'footer.html'; ?>

<link rel="stylesheet" type="text/css" href="style.css">



<body>
<!-- Background image -->
<div class="bg-img"></div>




 <div class="bg-txt">
  
  
  <?php if (($_POST['new_pass']) != ($_POST['new_pass_confirm']))
  
  {
  echo '
  <h1> Lois Builders &trade; </h1>
  
	Passwords do not match, please try again!
		
		
		
		<br><br><br>
        <html> <button onclick = "window.location.href=\'pass_reset.php\'"> Back </button> </html>

	';
  }
  
elseif (($_POST['new_pass']) == ($_POST['new_pass_confirm']))
  
 {
	  
#initialize the variables for database connection.
$host = "localhost";
$username = $_POST['username'];
$password = $_POST['new_pass'];
$db = "test";



#make a connection / stop if connection failed.
mysql_connect("$host", "$username", "$password") or die ("connection failed");
mysql_select_db("$db") or die ("database selection failed");


#Avoid MySQL injection
$username = stripslashes($username);
$password = stripslashes($password);


$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);


$query = "UPDATE users SET pass=" .$password . "WHERE username =" .$username;

$result = mysql_query($query);
$count = mysql_num_rows($result);


if($count == 1)
{	  
	  
	  echo 'Password Successfully updated. <br><br>
	  <html> <button onclick = "window.location.href=\'login.php\'"> Login </button> </html>';
}

else 
{
	echo "Password not updated, please try again.
		  <html> <button onclick = \"window.location.href=\'login.php\'\"> Login </button> </html>";

} 

