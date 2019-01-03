<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.btn{
    background-color: DodgerBlue;
    border: none;
    color: white;
    padding: 12px 16px;
    font-size: 30px;
	width:200px;
    cursor: pointer;
	margin-top:30px;
}

/* Darker background on mouse-over */
.btn:hover {
    background-color: RoyalBlue;
}
.dnt{
	float:right;
	margin-top:50px;
	margin-right:10px;
}
</style>
<body>

<?php 
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
//Select Database
mysqli_select_db($con,"blog")or
 die("Could not select db: " . mysql_error());

	$result=mysqli_query($con,"SELECT * FROM blogs WHERE 1");
	$i=mysqli_num_rows($result);
    if($i)
	{
		?>
		<center><h1 style="margin-top:100px;font-size:60px;background-color:black;color:white;">Blogs</h1></center>
		<?php
	}
	while($n=mysqli_fetch_array($result))
	{
	?>
	<br>
	<br>
<font style="margin-left:30px;margin-top:50px;font-size:50px;background-color:black;color:white;" ></abbr>  <?php echo $n["username"]; ?></abbr></font><font style="margin-left:100px;margin-top:50px;font-size:50px;background-color:black;color:white;" >  <?php echo $n["title"]; ?></font>
	<div class="dnt"><font size="5" style="color:#501B1D;"><?php echo $n["date"]; ?> <sup><?php echo $n["time"]; ?></sup></font></div>
	<?php
		if(empty($n["imagetmp"]))
	{
	?>
	<br>
	<br>
	<br>
	<br>
    <font size="10" class='a1'><center>No Image</center></font>
	<br>
	<br>
	<br>
	<br>
	<?php
	}
	else
	{
			?>
		<br>
		<br>
		<br>
		<br>
		<?php
		echo "<div class='b1'>
		<img style='margin-left:300px;' src='data:image/png;base64,".base64_encode($n["imagetmp"])."' alt='Profile Picture' class='avatar' >
		</div>";	
	}
	
  ?>
  <br>
  <br>
  <br>
<p><font class="a">-</font><font size="6" >  <?php echo $n["subject"]; ?></font></p>
<p><font class="a"></font><font size="5" >  <?php echo $n["body"]; ?></font></p>
<form action="blogdeleteedit.php" method="POST"><input name="bID" value=<?php echo $n["blogID"];?> type="hidden"><input type="hidden" name="aID" value=<?php echo $n["authorID"];?> ><button style="margin-left:450px;" class="btn" name="delete" type="submit"><i class="fa fa-trash"></i> Delete</button><button style="margin-left:100px;" class="btn" name="edit" type="submit"><i class="fa fa-bars"></i> Edit</button></form>
<hr style="background-color:black;margin-top:50px;margin-left:20px;" size="10">
	<?php
	}
?>
</body>
</html>

</body>
</html>