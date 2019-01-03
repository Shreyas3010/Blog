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
<body bgcolor="#b2b2b2">
<form enctype="multipart/form-data" method="post">
<p style="font-family:Courier;font-size:25px;font-weight:1000;margin-left:400px;margin-top:50px;">NAME :<input style="margin-left:33px;" type="text" name="name" id="name" required></p>
<p style="font-family:Courier;font-size:25px;font-weight:1000;margin-left:400px;margin-top:50px;">QUERY :<TEXTAREA style="margin-left:20px;" name="qu" COLS="63" ROWS="4" placeholder="Write something"required></TEXTAREA></p>
<center><button class="button" name="send" type="submit"><span>SEND </span></button></center>
		</form>
</body>
</html>

<?php
if(isset($_POST['send']))
{
$name=$_POST['name'];
$qu=$_POST['qu'];
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"blog")or
        mysqli_query($con,"CREATE DATABASE blog");

	   if($name!=NULL){
$qry = "INSERT INTO `qu`(name,que) VALUES('$name','$qu')";
//echo $qry; 
if(mysqli_query($con,$qry))
{
	echo '<script>alert("Done !");location="home.php";</script>';
}
else
{
   	echo '<script>alert("Error !! Sorry ");location="contactus.php";</script>';
}	
}
}
?>
