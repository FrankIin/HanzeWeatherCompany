<html>
<!-- include footer + import css -->
<?php include 'footer.html'; ?>
<link rel="stylesheet" type="text/css" href="style.css">



<body>
<!-- Background image -->
<div class="bg-img"></div>




 <div class="bg-txt">
  
  
  
  <h1> Reset Password </h1>
  
  <form action = "pass_reset_process.php" method="post">
  <!-- send the form to login.php -->
	
		<input type="text" name="username" placeholder="Username" required>
        <input type="password" name="new_pass" pattern=".{8,}" required title="Minimum 8 characters required." placeholder="Password" required>
		<input type="password" name="new_pass_confirm" pattern=".{8,}" required title="Minimum 8 characters required." placeholder="Confirm Password" required>
		<br><br>
		
        <input type="submit" value="Reset" >
		<input type="button" class = "btn" value = "Back " onclick= "location.href='login.php';" />
	
