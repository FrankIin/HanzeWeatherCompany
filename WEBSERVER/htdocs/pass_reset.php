
<?php
$newpass = "";
$new_pass_msg = "";

		
	$host = "localhost";
	$username_db = "root";
	$password_db = "H@nzeweather1";
	$db = "test";
	$table = "users";

	$conn = mysqli_connect("$host", "$username_db", "$password_db","$db");


if ($_SERVER["REQUEST_METHOD"] == "POST")
	

	{
		
		$username = $_POST['username'];

		$query = mysqli_query($conn, "SELECT pass FROM users WHERE username = '$username'");		
		$result = mysqli_num_rows($query);
		
		
		if ($result == 0)
			{$new_pass_msg = "Error! User does not exist!";}
			
	elseif ($_POST['new_pass'] != $_POST['new_pass_confirm'] && !($result == 0))
			{$new_pass_msg = "Passwords do not match, please try again!";}
			
			
	elseif ($_POST['new_pass'] == $_POST['new_pass_confirm'] && !($result == 0))

	{
		$newpass = $_POST['new_pass'];
		
		
		
		$username = $_POST['username'];
		$new_pass_plain = $_POST['new_pass'];
		
		#avoid MySQL injection
		$username = mysqli_real_escape_string($conn, stripslashes($username));
		$new_pass_plain = mysqli_real_escape_string($conn, stripslashes($new_pass_plain));


		$new_pass = password_hash($new_pass_plain, PASSWORD_DEFAULT);
		
		$passreset_query = mysqli_query($conn,"UPDATE users SET pass = '$new_pass' WHERE username = '$username'");
		$new_pass_msg = 'Password successfully updated! You may now login! Click back to return to login page.';

		
		
		
		
	}		
		
	}


?>

<html>
<title> Reset Password </title>

<style>
.error 
{color: #D12C2C;
 font-size: 16px;
}
</style>

<!-- include footer + import css -->
<?php include 'footer.html'; ?>
<link rel="stylesheet" type="text/css" href="style.css">



<body>
<!-- Background image -->
<div class="bg-img"></div>




 <div class="bg-txt">
  
  
  
  <h1> Reset Password </h1>
  
  <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
  <!-- send the form to login.php -->
	
		<input type="text" name="username" placeholder="Username" required>
        <input type="password" name="new_pass" pattern=".{8,}" required title="Minimum 8 characters required." placeholder="New Password" required>
		<input type="password" name="new_pass_confirm" pattern=".{8,}" required title="Minimum 8 characters required." placeholder="Confirm Password" required>
		<br><br>
		<span class = "error"> <?php echo $new_pass_msg . "<br><br>"; ?> </span>
        <input type="submit" value="Reset" >
		<input type="button" class = "btn" value = "Back " onclick= "location.href='login.php';" />
	
</body>
</html>