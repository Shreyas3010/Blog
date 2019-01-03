<!DOCTYPE HTML>
<html>
<head><title>Sign up</title></head>
<style>
.upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btnn {
  color: gray;
  background-color: white;
  padding: 8px 20px;
  font-size:14px;
  font-family:Roboto;
  width:505px;
  height:60px;
  margin-left:1px;
  pointer:;
  
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}

.a{
  margin-top:40px;
  text-decoration:none;
}

.b{

  width: 30%;
  padding: 20px;
  font-family: "Roboto";  
  outline-color:white;  
  outline-style:groove;
  
}
 .button {
	   border-radius: 4px;
    position: relative;
    background-color:#9b9595;
    border: none;
    font-size: 20px;
    color: #FFFFFF;
    padding: 20px;
    width:33%;
    text-align: center;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
}

.button:after {
    content: "";
    background:#c6c0c0;
    display: block;
    position: absolute;
    padding-top: 300%;
    padding-left: 350%;
    margin-left: -20px!important;
    margin-top: -120%;
    opacity: 0;
    transition: all 0.8s
}

.button:active:after {
    padding: 0;
    margin: 0;
    opacity: 1;
    transition: 0s
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

a:hover
{
	
	color:#4B33DC;
}
input:hover{
	background:#EAEAEA;	
}
</style>
<body background="image/provider_signup1.jpg" style="background-size:cover;background-position:center">
<br>
<form name="customer_signup" method="POST" class="a" enctype="multipart/form-data"><center>
<h1 style="color:#F8F8F8;">Sign Up</h1>
<br>
<div><input type="text" name="name" placeholder="Name" class="b" required ></div>
<div><input type="text" name="username" placeholder="Username" class="b" required ></div>
<div><input type="email" name="email" placeholder="E-mail" class="b" required ></div>

<div><input type="password" name="password" placeholder="Password" class="b" required ></div>

<div><input type="password" name="password1" placeholder="Confirm Password" class="b" required ></div>

<!--<div><input type="number" name="contact" placeholder="Contact Number" class="b"  required pattern="[0-9]{10}"></div>-->
<div class="upload-btn-wrapper">
  <button class="btnn w3-small">Upload Profile Image</button>
  <input type="file" name="profileimage" />
</div><br>
<button class="button"  name="submit" ><span>Register </span></button>
</body>
</html>


<?php
#not completed
if(isset($_POST['submit']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=md5($_POST['password']);
echo "pass:$password";
$contact=$_POST['contact'];
$imagename=$_FILES['profileimage']['name'];
$imagetmp=addslashes(file_get_contents($_FILES['profileimage']['tmp_name']));
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"blog")or
        mysqli_query($con,"CREATE DATABASE blog");

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
?>
