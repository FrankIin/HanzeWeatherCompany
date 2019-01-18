<!DOCTYPE html>
<html>
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



</style>
</head>

<body>
<img src = 'logo.jpg' width = 120 height = 50>
<ul>

  <li><a class = "active" href="index.html">Home</a></li>
  <li><a href="about.html">About</a></li>
  <li><a href="contact.html">Contact</a></li>
  <li style="float:right"><a href = "logout.php"><img src = "logout_btn.png" style="width:25px;height:21px;"></a></li>
  <li style="float:right"><font size = 4><a>Welcome <?php echo $_SESSION['username']; ?></a></font></li>
  

  

</ul>

</body>
</html>