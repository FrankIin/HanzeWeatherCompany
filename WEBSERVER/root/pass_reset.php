<html>

<style>
.error 
{color: #D12C2C;
 font-size: 30px;
}
</style>

<?php
$newpass = "";
$new_pass_msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
	

	{
		$username = $_POST['username'];
		
		
		mysql_select_db("test");
		$query = mysql_query("SELECT pass FROM users WHERE username = '$username'");
		
		$result = mysql_num_rows($query);
		
		
		if ($result == 0)
			
			{
		$new_pass_msg = "Error! User does not exist!";
			}
	elseif ($_POST['new_pass'] != $_POST['new_pass_confirm'] && !($result == 0))
	
		{
			$new_pass_msg = "Passwords do not match, please try again!";	
		}
	elseif ($_POST['new_pass'] == $_POST['new_pass_confirm'] && !($result == 0))

	{
		$newpass = $_POST['new_pass'];
		
		
		$host = "localhost";
		$username = $_POST['username'];
		$new_pass = $_POST['new_pass'];
		$db = "test";
		
		#avoid MySQL injection
		$username = mysql_real_escape_string(stripslashes($username));
		$new_pass = mysql_real_escape_string(stripslashes($new_pass)); 
		
		$passreset_query = mysql_query("UPDATE users SET pass = '$new_pass' WHERE username = '$username'");
		$new_pass_msg = 'Password successfully updated! You may now login! Click back to return to login page';
		
		
		
		
	}		
		
	}


?>



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
        <input type="password" name="new_pass" pattern=".{8,}" required title="Minimum 8 characters required." placeholder="Password" required>
		<input type="password" name="new_pass_confirm" pattern=".{8,}" required title="Minimum 8 characters required." placeholder="Confirm Password" required>
		<br><br>
		<span class = "error"> <?php echo $new_pass_msg . "<br>"; ?> </span>
        <input type="submit" value="Reset" >
		<input type="button" class = "btn" value = "Back " onclick= "location.href='login.php';" />
	
