<?php
session_start();
?>
<html>
<style>
.btt1 {
    background-color: #008CBA; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	font-variant: small-caps;
}
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
	$BID=$_SESSION["BID"];
	
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
		if($n["bloggerID"]==$BID)
		{
			
		}
		else
		{
		   
		   ?>
	<br>
	<br>
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
<br>
	<center><button class="btt1">Follower <?php echo $n['follower']; ?></button>
	<button class="btt1" style="margin-left:100px;">Following <?php echo $n['following'];?></button>
</center>
<br>
	<?php 
		//echo $BID;
		//echo $n['bloggerID'];
		$tmp=$n['bloggerID'];
		$q1="SELECT * FROM followtable WHERE follower=$BID AND following=$tmp";
		//echo $q1;
		$r2=mysqli_query($con,$q1);
	$i2=mysqli_num_rows($r2);
	if($i2)
	{
		?>
		<form action="unfollow.php"  method="POST"><input type="hidden" name="follower" value=<?php echo $BID;?> >
		<input type="hidden" name="following" value=<?php echo $n['bloggerID'];?> >
		<input type="hidden" name="cnt" value=<?php echo $n['follower'];?> >
		<center><button  class="btt1">unFollow</button></form></center>
		<?php
		
	}
	else
	{
		?>
		<form action="follow.php"  method="POST"><input type="hidden" name="follower" value=<?php echo $BID;?> >
		<input type="hidden" name="following" value=<?php echo $n['bloggerID'];?> >
		<input type="hidden" name="cnt" value=<?php echo $n['follower'];?> >
		<center><button class="btt1">Follow</button></form></center>
		<?php
	}
	?>
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
		<img style='margin-left:40px;' src='data:image/png;base64,".base64_encode($n["imagetmp"])."' alt='Profile Picture' class='avatar' >
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
	}
?>
</body>
</html>