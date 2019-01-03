<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.button {
  margin-top:60px;
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size:20px;
  padding: 20px;
  width: 140px;
  transition: all 0.5s;
  cursor: pointer;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
input[type=text], input[type=email] {
    width:40%;
    padding: 15px;
    margin: 10px 0 2px 20px;
    border: none;
    background:white;
}

</style>
<body bgcolor="#E6E6FA">
<center><p style="margin-top:30px;font-family:BankFuturistic;font-size:30px;font-weight:900;margin-top:50px;">Blog</p></center>
<form enctype="multipart/form-data" method="post">
<p style="font-family:Courier;font-size:25px;font-weight:1000;margin-left:400px;margin-top:50px;">ENTER AN OTP :<input style="margin-left:47px;" type="text" name="entrtp" id="entrtp" required></p>
<!--<p style="font-family:Courier;font-size:25px;font-weight:1000;margin-left:400px;margin-top:50px;">SOURCE :<input style="margin-left:88px;" type="text" name="slink" id="slink"></p>-->
<center><button class="button" name="check" type="submit"><span>CHECK </span></button></center>
		</form>
</body>
</html>
<?php
session_start();
if(isset($_POST['check']))
{
		
$enterotp=$_POST['entrtp'];
$otp=$_SESSION['otp'];
echo $otp; 
if($enterotp==$otp)
{
	$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"blog")or
        mysqli_query($con,"CREATE DATABASE blog");
	$name=$_SESSION['name'];
$email=$_SESSION['email'];
$username=$_SESSION['username'];
$password=$_SESSION['password'];
$contact=$_SESSION['contact'];
$imagename=$_SESSION['imagename'];
$imagetmp=$_SESSION['imagetmp'];
	   if($name!=NULL){
$qry = "INSERT INTO `blogger`(name,username,email,verified,password,follower,following,permission,new,imagetmp,imagename) VALUES('$name','$username','$email',0,'$password',0,0,0,1,'$imagetmp','$imagename')";
if(mysqli_query($con,$qry))
{
	echo '<script>alert("Successfully signed up!!!");location="bloggerlogin.php";</script>';
}
else
{
   	echo '<script>alert("Error !! Sorry please sign up again.");location="bloggersignup.php";</script>';
}	
}
}
else
{
	echo '<script>alert("Wrong !!.");location="bloggersignup.php";</script>';
}

}
?>