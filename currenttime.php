<?php
$d=date("Y-m-d");
echo $d;
echo "<br>";
date_default_timezone_set("Asia/Kolkata");
$t=date("H:i:sa");
echo $t;
echo "<br>";
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
	session_start();
//Select Database
mysqli_select_db($con,"blog")or
 die("Could not select db: " . mysql_error());
$result=mysqli_query($con,"INSERT INTO `a1`(dat,tim) VALUES('$d','$t')");
$result=mysqli_query($con,"SELECT * FROM a1 WHERE 1");
echo "aa";
echo "</br>";
while($n=mysqli_fetch_array($result))
{
	echo $n["tim"];
	echo "</br>";
	echo $n["dat"];
	echo "</br>";
}
?>