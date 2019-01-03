<?php

use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	
	// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function


require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

?>


<!DOCTYPE HTML>
<html>
<script type="text/javascript">
  
  function fn() {

    cap = Math.floor((Math.random()*1000000) +1);
  document.getElementById("var1").value = cap;


  }
  </script>
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
<body onload="fn()" background="image/provider_signup1.jpg" style="background-size:cover;background-position:center">
<br>
<form name="customer_signup" method="POST" class="a" enctype="multipart/form-data"><center>
<h1 style="color:#F8F8F8;">Sign Up</h1>
<br><input type="hidden" id="var1" name="var1">
<div><input type="text" name="name" placeholder="Name" class="b" required ></div>
<div><input type="text" name="username" placeholder="Username" class="b" required ></div>
<div><input type="email" name="email" placeholder="E-mail" class="b" required ></div>

<div><input type="password" name="password" placeholder="Password" class="b" required ></div>

<!--<div><input type="password" name="password1" placeholder="Confirm Password" class="b" required ></div>-->

<!--<div><input type="number" name="contact" placeholder="Contact Number" class="b"  required pattern="[0-9]{10}"></div>-->
<div class="upload-btn-wrapper">
  <button class="btnn w3-small">Upload Profile Image</button>
  <input type="file" name="profileimage" />
</div><br>
<button class="button"  name="submit" ><span>Register </span></button>
</body>
</html>


<?php
if(isset($_POST['submit']))
{
	

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'jinesh1076@gmail.com';                 // SMTP username
    $mail->Password = 'A@123456';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('jinesh1076@gmail.com','Shreyas Patel');
	$a1=$_POST['email'];
	//echo '<script>alert("$a1");</script>';
	$mail->addAddress($a1);
    //Content
    $mail->isHTML(true);	// Set email format to HTML
	$mail->Subject = "ENTER THE OTP AS FOLLOWS";
    //$mail->Body    = 'SW03 <b>2018!</b>';
	$mail->Body=$_POST["var1"];
    if(!$mail->send()) {
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  } else {
      echo 'Message has been sent';
	  session_start();
	$_SESSION['name']=$_POST['name'];
	
			$_SESSION['email']=$_POST['email'];
$_SESSION['username']=$_POST['username'];
$_SESSION['password']=md5($_POST['password']);
$_SESSION['contact']=$_POST['contact'];
$imagename=$_FILES['profileimage']['name'];
$_SESSION['imagename']=$imagename;
$imagetmp=addslashes(file_get_contents($_FILES['profileimage']['tmp_name']));
$_SESSION['imagetmp']=$imagetmp;
$_SESSION['otp']=$_POST["var1"];
 echo "<script type='text/javascript'>location='verifyblogger.php';</script>"; 
	  }
	
	
}
catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}
?>
