<html>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.topnav {
  overflow: hidden;
 background-color:Transparent;

}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color:#C0C0C0;
}

.topnav a.active {
  background-color: #4CAF50;
  color: white;
 font-variant: small-caps;
  
}

.topnav a.a1 {
  color: black;
}
.topnav a.a2
{
	color:black;
	float:right;
	margin-right:0px;
}
</style>
<body>
<div class="topnav">
  <a class="active"  >Blogger</a>
  <a class="a1 w3-large" target="target" href="bloggersignup.php">Sign Up</a>
  <a class="a1 w3-large" target="target" href="bloggerlogin.php">Log In</a>
  <a class="a1 w3-large" target="target" href="signupadmin.php">Admin Sign Up</a>
  <a class="a1 w3-large" target="target" href="loginadmin.php">Admin Login</a> 
  <a class="a2 w3-large" target="target" href="contactus.php" >Contact us</a>
</div>
<div><iframe style="border:none;" src="home.php" width="100%" height="91%" name="target"></iframe></div>
</body>
</html>