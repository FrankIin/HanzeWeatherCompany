<?php
$login_error = '';
session_start();
if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] == true)

{
	header('Location: index.php');
}

elseif  ($_SERVER["REQUEST_METHOD"] == "POST")

{
#initialize the variables necessary for database connection.
$host = "localhost";
$username_db = "root";
$password_db = "usbw";
$db = "test";
$table = "users";

#make a connection / stop if connection failed.
mysql_connect("$host", "$username_db", "$password_db") or die ("connection failed");
mysql_select_db("$db") or die ("database selection failed");

#Store form data 
$username = $_POST['username'];
$password = $_POST['password'];

#Avoid MySQL injection
$username = mysql_real_escape_string(stripslashes($username));
$password = mysql_real_escape_string(stripslashes($password));



$query = "SELECT * FROM $table WHERE username='$username' and pass= '$password'";
$count = mysql_num_rows(mysql_query($query));






#if count > 1 then user exists.
if ($count == 1)
	
	{
	$query_login = mysql_query("SELECT * FROM $table WHERE username='$username' and pass= '$password'");
	
	
		
		session_start();
		
		$_SESSION['logged-in'] = true;
		
		while ($row = mysql_fetch_assoc($query_login)) {
		$_SESSION['username'] = $row['username'];}


		header("Location: index.php");
		
	}
	#if user doesn't exist in database/ wrong password (count < 1 )...
	
elseif ($count < 1)

{
	$login_error = "<b>Login Failed due to one of the following reasons: <br> &#8226; Invalid Username <br> &#8226; Invalid Password <br><br> Please try again!</b>";
}

}
?>







<html>
<title> Login </title>
<!-- import css -->
<?php include 'footer.html'; ?>
<link rel="stylesheet" type="text/css" href="style.css">


<style>
.error 
{color: #D12C2C;
 font-size: 16px;
}
</style>

<body>
<!-- Background image -->
<div class="bg-img"></div>




 <div class="bg-txt">
  
  
  
  <h1> Login </h1>
  <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="post">
  <!-- send the form to login.php -->
	
		<input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required><br><br>
		<span class = "error"> <?php echo $login_error . '<br><br>' ?> </span>
        <input type="submit" value="Login" >
		<br>

		<h3> <a href = "pass_reset.php">forgot password? </a> </h3>
		<i>Register a new user? Please contact us.</i>
	
	</form>	
  </div>


</body>

</html>