<?php
//echo $_POST["bID"];
//echo "</br>";
//echo $_POST["aID"];
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
//Select Database
$bID=$_POST['bID'];
mysqli_select_db($con,"blog")or
 die("Could not select db: " . mysql_error());
if(isset($_POST['delete']))
{
	session_start();
	$username=$_SESSION["USERNAME"];
	$newr=mysqli_query($con,"SELECT * FROM blogs WHERE blogID=$bID");
	$nr=mysqli_fetch_array($newr);
	$tn=$nr["title"];
	$result=mysqli_query($con,"DELETE FROM blogs WHERE blogID=$bID");
	mysqli_query($con,"INSERT INTO `adminnotification`(suba,type,subb,seen) VALUES('$username',1,'$tn',0)");
	echo '<script>alert("Deleted !");location="bloggerhome.php";</script>';
}
if(isset($_POST['edit']))
{
	$result=mysqli_query($con,"SELECT * FROM blogs WHERE blogID=$bID");
	$n=mysqli_fetch_array($result);
	//echo $n['body'];
	?>
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
<form action="personaleditblog01.php" enctype="multipart/form-data" method="post">
<input name="bID" value="<?php echo $n['blogID'];?>" type="hidden"><input type="hidden" name="aID" value="<?php echo $n['authorID'];?>" >
<p style="font-family:Courier;font-size:25px;font-weight:1000;margin-left:400px;margin-top:50px;">TITLE :<input style="margin-left:47px;" type="text" name="title" id="title" value="<?php echo $n['title'];?>" required></p>
<p style="font-family:Courier;font-size:25px;font-weight:1000;margin-left:400px;margin-top:50px;">SUBJECT :<input type="text" name="sub" id="sub" value="<?php echo $n['subject'];?>" required></p>
<p style="font-family:Courier;font-size:25px;font-weight:1000;margin-left:400px;margin-top:50px;">CONTENT :<TEXTAREA style="margin-left:20px;" name="con" COLS="63" ROWS="7" required><?php echo $n['body'];?></TEXTAREA></p>
<!--<p style="font-family:Courier;font-size:25px;font-weight:1000;margin-left:400px;margin-top:50px;">SOURCE :<input style="margin-left:88px;" type="text" name="slink" id="slink"></p>-->
<center><button class="button" type="submit"><span>Edit </span></button></center>
		</form>
</body>
</html>
	
	
	<?php
}
?>