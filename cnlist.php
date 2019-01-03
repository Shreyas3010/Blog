<?php
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"blog")or
        mysqli_query($con,"CREATE DATABASE blog");
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
	$result=mysqli_query($con,"SELECT * FROM qu WHERE 1");
	while($n=mysqli_fetch_array($result))
	{
			?>
		<hr style="background-color:black;margin-top:10px;" size="5">
			<ul><li><font class="abc"><?php echo $n['name']; ?> - <?php echo $n['que']; ?></font></li></ul>
	<?php
	
	}
	?>
	<hr style="background-color:black;margin-top:10px;" size="5">
	
</body>
</html>