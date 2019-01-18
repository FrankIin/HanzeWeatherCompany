
<?php

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
	#if user doesn't exist in database (count < 1 )...
	
elseif ($count < 1)

{
	
	echo "Invalid Password or User doesn't exist in database. Redirecting back...";
	header("refresh:5;url=login.php");
	
}

?>