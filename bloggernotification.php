<?php
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"blog")or
        mysqli_query($con,"CREATE DATABASE blog");
		session_start();
		$bloggerID=$_SESSION['BID'];
?>
<html>
<style>
.abc{
	
	font-size:30px;
	margin-top:10px;
	color:#663300;
	
}
</style>
<body>
<?php
	$result=mysqli_query($con,"SELECT * FROM bloggernotification WHERE bloggerID='$bloggerID' AND seen=0");
	//echo "SELECT * FROM bloggernotification WHERE bloggerID='$bloggerID' AND seen=0";
	while($n=mysqli_fetch_array($result))
	{
			?>
		<hr style="background-color:black;margin-top:10px;" size="5">
		<?php
		if($n['type']==7)
		{ 
			?>
			<ul><li><font class="abc"> You got like <?php echo $n['subb']; ?> blog </font></li></ul>
			<?php
		}
		if($n['type']==8)
		{ 
			?>
			<ul><li><font class="abc"><?php echo $n['suba']; ?> has commented on <?php echo $n['subb']; ?> blog </font></li></ul>
			<?php
		}
		if($n['type']==3)
		{ 
			?>
			<ul><li><font class="abc"><?php echo $n['suba']; ?> has followed you</font></li></ul>
			<?php
		}
		if($n['type']==4)
		{ 
			?>
			<ul><li><font class="abc"><?php echo $n['suba']; ?> has unfollowed you</font></li></ul>
			<?php
		}
		if($n['type']==2)
		{ 
			?>
			<ul><li><font class="abc"><?php echo $n['suba']; ?> has edited a blog on <?php echo $n['subb']; ?></font></li></ul>
			<?php
		}
		if($n['type']==1)
		{ 
			?>
			<ul><li><font class="abc" ><?php echo $n['suba']; ?> has deleted a blog on <?php echo $n['subb']; ?></font></li></ul>
			<?php
		}
		if($n['type']==6)
		{ 
			?>
			<ul><li><font class="abc" >Now, You have permission to blog.</font></li></ul>
			<?php
		}
		if($n['type']==5)
		{ 
			?>
			<ul><li><font class="abc" >Now, You have no permission to blog.</font></li></ul>
			<?php
		}
	}
	?>
	<hr style="background-color:black;margin-top:10px;" size="5">
</body>
</html>
<?php
mysqli_query($con,"UPDATE bloggernotification SET seen=1 WHERE bloggerID='$bloggerID'");
?>