<?php
session_start();
?>
<html>
<style>

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

.avatar {
    width:50%;
    border-radius:50%;
}
.a1{
	margin-left:550px;
	font-size:35px;
	font-weight: bold;
	}
.a{
	margin-left:350px;
	font-size:25px;
	font-weight: bold;
	}
.b{
	font-size:25px;
	
}

.c{
	font-size:25px;
	margin-left:660px;
}
</style>
<body>

<?php 
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
//Select Database
mysqli_select_db($con,"blog")or
 die("Could not select db: " . mysql_error());

	$result=mysqli_query($con,"SELECT * FROM blogger WHERE new=0");
	$i=mysqli_num_rows($result);
    if($i)
	{
		?>
		<center><h1 style="margin-top:100px;font-size:60px;background-color:black;color:white;">Bloggers</h1></center>
			<p style="font-size:25px;"><font style="color:blue;"> * </font>Permit to blog <font style="color:red;"> * </font>No permit to blog</p>
		<?php
	}
	while($n=mysqli_fetch_array($result))
	{
	?>
	<br>
	<br>
<form action="changepermission.php"  method="POST"><input type="hidden" name="id" value=<?php echo $n["bloggerID"];?> ><input type="hidden" name="per" value=<?php echo $n["permission"];?> ><button style="background-color:Transparent;border:none;cursor:pointer;" type="submit" ></form>
<?php
if($n["permission"])
{
	?>
	<font style="color:blue;font-size:70px;font-weight:100;"> * </font>
	<?php
}
else
{
	?>
	<font style="color:red;font-size:50px;font-weight:100;"> * </font>
	<?php
}
?>
<font style="margin-top:50px;font-size:50px;background-color:black;color:white;" >  <?php echo $n["username"]; ?></font>
	<?php
		if(empty($n["imagetmp"]))
	{
	?>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
    <font class='a1'>No Profile Image</font>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<?php
	}
	else
	{
		echo "<div class='imgcontainer'>
		<img style='margin-left:300px;' src='data:image/png;base64,".base64_encode($n["imagetmp"])."' alt='Profile Picture' class='avatar' >
		</div>";	
	}
	
  ?>
  <br>
  <br>
  <br>
<p><font class="a">Name :</font><font class="b">  <?php echo $n["name"]; ?></font></p>
<p><font class="a">Email :</font><font class="b">  <?php echo $n["email"]; ?></font></p>
<hr style="background-color:black;margin-top:50px;margin-left:20px;" size="10">
	<?php
	}
?>
</body>
</html>