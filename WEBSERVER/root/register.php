<?php
$pass_conf_err = $email_conf_err = $query_msg = '';

if ($_SERVER["REQUEST_METHOD"] == "POST")

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
$email = $_POST['email'];
$f_name = $_POST['f_name'];
$d_of_birth = $_POST['d_of_birth'];

$password_conf = $_POST['password_conf'];
$email_conf = $_POST['email_conf'];

#Avoid MySQL injection
$username = mysql_real_escape_string(stripslashes($username));
$password = mysql_real_escape_string(stripslashes($password));

if ($email != $email_conf)
	
	{
		$email_conf_err = "&#8226; Emails do not match.";
	}
	
if ($password != $password_conf)
	
	{	
		$pass_conf_err = "&#8226; Passwords do not match.";
	}
	
	
if ($email == $email_conf && $password == $password_conf)
{

$add_user_query = mysql_query("INSERT INTO users (full_name, date_of_birth, username, pass, email) VALUES ('$f_name', '$d_of_birth', '$username', '$password', '$email') ");

if($add_user_query)
{
$query_msg = 'User added successfully';
}

else
{
	$query_msg = 'User already exists or an unknown error occured. Please try again!';
}

}


}








?>



<html>
<title> Register </title>
<style>
.success 
{color: #D12C2C;
 font-size: 16px;
}

.error 
{color: #D12C2C;
 font-size: 16px;
}
</style>

<body>
<!-- import css -->
<?php include 'footer.html'; ?>
<link rel="stylesheet" type="text/css" href="style.css">
<div class="bg-img"></div>

 <div class="bg-txt">
  
  
  
  <h1> User Registration </h1>
  <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"  method="post">
  <!-- send the form to login.php -->
  
		<input type="text" name="f_name" placeholder="Full Name" required><br>
		<input type="date" name="d_of_birth" placeholder = "Date of Birth" required><br>
		<input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
		<input type="password" name="password_conf" placeholder="Repeat Password" required><br>
		<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { echo "<span class = \"error\"> $pass_conf_err </span><br>";} ?>
		<input type = "text" name = "email" placeholder = "E-Mail" required><br>
		<input type = "text" name = "email_conf" placeholder = "Confirm E-Mail" required ><br>
		<?php if ($_SERVER["REQUEST_METHOD"] == "POST") { echo "<span class = \"error\"> $email_conf_err </span><br>";} ?>
		<br><br>
		<span class = "error"> </span>
        <input type="submit" value="Register" >
		<input type="button" class = "btn" value = "Back " onclick= "location.href='login.php';" /><br><br>
		<span class = "success"> <?php echo $query_msg; ?> </span><br>
		<br>

	
	</form>	
  </div>

 </div>
 
 
 </body>
 </html>