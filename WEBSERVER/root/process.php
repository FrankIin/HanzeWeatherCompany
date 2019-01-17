
<?php

#initialize the variables for database connection.
$host = "localhost";
$username = "";
$password = "";
$db = "test";
$table = "users";

#make a connection / stop if connection failed.
mysql_connect("$host", "$username", "$password") or die ("connection failed");
mysql_select_db("$db") or die ("database selection failed");

#Store form data 
$username = $_POST['username'];
$password = $_POST['password'];

#Avoid MySQL injection
$username = stripslashes($username);
$password = stripslashes($password);


$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

$query = "SELECT * FROM $table WHERE username='$username' and pass= '$password'";
$result = mysql_query($query);


$count = mysql_num_rows($result);

#if count > 1 then user exists.
if ($count == 1)
	
	{
		
		session_start();
		$_SESSION['logged-in'] = true;
		$_SESSION['username'] = $username;
		header("Location: index.php");
		
	}
	#if user doesn't exist in database (count < 1 )...
	
elseif ($count < 1)

{
	
	echo "Invalid Password or User doesn't exist in database. Redirecting back...";
	header("refresh:5;url=login.php");
	
}

?>