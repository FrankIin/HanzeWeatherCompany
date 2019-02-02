<!DOCTYPE html>
<html>
<title> Home </title>
<head>

<style>

ul {
  list-style-type: none;
  margin: 5;
  padding: 0;
  overflow: hidden;
  background-color: #aaa;
  
}

li {
  float: left;
  
}

li a{

display: block;
color: white;
text-align: center;
padding: 10px 25px;
text-decoration: none;
}

li a:hover 
{
background-color: green;
}

.active
{
background-color: #4CAF50;
}

.logo_pos

{
	position: relative;
	left: 5px;
}

.welcome_user

{
	float:right;
	color: white;
	position: relative;
	left: -5px;
	top: 10px;
	
}
</style>
</head>

<body>
<div class = "logo_pos"><img src = 'logo.jpg' width = 120 height = 50></div>
<ul>

  <li><a class = "active" href="index.php">Home</a></li>
  <li><a href="prf.php">Profile</a></li>
  <li><a href="contact.html">Contact</a></li>
  <li style="float:right"><a href = "logout.php"><img src = "logout_btn.png" style="width:25px;height:21px;"></a></li>
  <div class = "welcome_user"><i><font size = 4><a>Welcome <?php echo $_SESSION['username']; ?></a></font></i></div>

  

  

</ul>

</body>
</html>