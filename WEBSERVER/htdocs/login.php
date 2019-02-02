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
$username_db = "admin";
$password_db = "z5IxP5QJUrGurmtC";
$db = "test";
$table = "users";

#make a connection / stop if connection failed.
mysqli_connect("$host", "$username_db", "$password_db") or die ("connection failed");
$conn = mysqli_connect("$host", "$username_db", "$password_db");
mysqli_select_db($conn, $db) or die ("database selection failed");

#Store form data 
$username = $_POST['username'];
$password_plain = $_POST['password'];


#Avoid MySQL injection
$username = mysqli_real_escape_string($conn,stripslashes($username));
$password_plain = mysqli_real_escape_string($conn,stripslashes($password_plain));



$query = "SELECT * FROM $table WHERE username='$username'";

$count = mysqli_num_rows(mysqli_query($conn,$query));






#if count > 1 then user exists.
if ($count == 1)
	
	{
	
	$res = mysqli_query($conn,"SELECT * FROM $table WHERE username='$username'");
	while ($row = mysqli_fetch_assoc($res))
	{
		$hash = $row['pass'];
		$_SESSION['username'] = $row['username'];
		$_SESSION['full_name'] = $row['full_name'];
		$_SESSION['email'] = $row['email'];
		
		
		if (password_verify($password_plain, $hash))
		{
			$_SESSION['logged-in'] = true;
			header("Location: index.php");
		}
		
	}
	
	
	
	
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