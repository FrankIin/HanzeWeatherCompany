<!DOCTYPE html>
<html>
<title> Profile </title>
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
<div class = "logo_pos"><a href = "index.php"><img src = 'logo.jpg' width = 120 height = 50></a></div>
<ul>

  <span title = "Home Page"> <li><a href="index.php">Home</a></li></span>
  <span title = "View Profile"><li><a class = "active" href="prf.php">Profile</a></li></span>
  <span title = "Logout"><li style="float:right"><a href = "logout.php"><img src = "logout_btn.png" style="width:25px;height:21px;"></a></li></span>
  <div class = "welcome_user"><i><font size = 4><a>Welcome <?php echo $_SESSION['username']; ?></a></font></i></div>

  

  

</ul>

</body>
</html>