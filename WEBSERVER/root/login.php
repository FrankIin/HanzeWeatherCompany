<html>
<!-- import css -->
<?php include 'footer.html'; ?>
<link rel="stylesheet" type="text/css" href="style.css">


<body>
<!-- Background image -->
<div class="bg-img"></div>




 <div class="bg-txt">
  
  
  
  <h1> Lois Builders &trade; </h1>
  <form action = "process.php"  method="post">
  <!-- send the form to login.php -->
	
		<input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login" >
		<br>

		<h3> <a href = "pass_reset.php">forgot password? </a> </h3>
	
	</form>	
  </div>


</body>

</html>