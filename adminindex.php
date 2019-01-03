<?php 
session_start();
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
mysqli_select_db($con,"blog")or
 die("Could not select db: " . mysql_error());
	$notification=mysqli_query($con,"SELECT * FROM adminnotification WHERE seen=0");
    $nt=mysqli_num_rows($notification);
?>
<html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
.badge {
  position: absolute;
  top: -5px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color:red;
  color: white;
}
</style>
<body>
<div class="topnav">
  <a class="active" target="target" href="adminhome.php" ><?php echo $_SESSION["USERNAME"]; ?></a>
  <a class="a1 w3-large" target="target" href="adminhomemain.php">Blog</a>
    <a class="a1 w3-large" target="target" href="adminbloggerlist.php">Blogger List</a>
	 <a class="a1 w3-large" target="target" href="cnlist.php">Contact us</a>
	<a class="a2 w3-large" target="_top" href="adminlogout.php" >Logout</a>
	<a class="a1 w3-large" target="target" href="adminnotification.php"><span><i class="fa fa-bell" style="font-size:32px;color:#f2f204;"></i></span><span class="badge"><?php echo $nt;?></span></a>
</div>
<div><iframe style="border:none;" src="adminhomemain.php" width="100%" height="91%" name="target"></iframe></div>
</body>
</html>