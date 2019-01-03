<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
body, html {
    height: 100%;
    font-family: Arial, Helvetica, sans-serif;
}

* {
    box-sizing: border-box;
}

.bg-img {
    background-image: url("image/info.jpg");
	height:100%; 
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;
}
.container {
    position: absolute;
    right: 0;
    margin: 20px;
    width:470px;
	margin-right:6%;
    padding: 16px;
    background-color:#FFEBCA;
}
input[type=text], input[type=password] {
    width:90%;
    padding: 15px;
    margin: 5px 0 22px 0;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
    outline: none;
}
.btn {
    background-color:#B1ACAC;
    color: white;
    padding: 16px 20px;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity:0.8;
}
 .button {
	   border-radius: 4px;
    position: relative;
    background-color:#9b9595;
	padding: 16px 20px;
    border: none;
    width: 100%;
    font-size: 20px;
    color: #FFFFFF;
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

input:hover{
	background:#EAEAEA;	
}
.home1
{
	margin-left:91%;
    background-color:Transparent;
    border: none;
    color: black;
    padding: 12px 16px;
    font-size:40px;
    cursor: pointer;	
}
.home1:hover
{
	color:white;
}
</style>
</head>
<body>
<div class="bg-img">
  <form style="margin-top:6%;"  action="adminlogin01.php" method="post" class="container" target="_top">
    <center><h1>Login</h1></center>
	<label for="email"><b>Email</b></label>
	<br>
    <input type="text" placeholder="Email" name="email" required>
<br><br>
    <label for="psw"><b>Password</b></label>
	<br>
    <input type="password" placeholder="Enter Password" id="password" name="password" required>
	<img style="cursor: pointer;" onmouseover="myFunction()" style="margin-left:8px;" onmouseout="myFunction()" border="0" src="Image\password_visible.png" width="25" height="50"> 
	<script>
	function myFunction() {
		var x = document.getElementById("password");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
				}
		}
</script>

<br><button class="button"  type="submit" ><span>Login </span></button>
<br>
	</form>
</div>
</body>
</html>