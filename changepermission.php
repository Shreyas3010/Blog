<?php
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"blog")or
        mysqli_query($con,"CREATE DATABASE blog");
$ID=$_POST["id"];
$per=$_POST["per"];
//echo $ID;
//echo "</br>";
//echo $per;
if($per)
{
	$qry="UPDATE blogger SET permission=0 WHERE bloggerID=$ID";
	//echo $qry;
	mysqli_query($con,$qry);
	mysqli_query($con,"INSERT INTO `bloggernotification`(bloggerID,suba,type,subb,seen) VALUES('$ID','Admin',5,'xyz',0)");
}
else
{
	$qry="UPDATE blogger SET permission=1 WHERE bloggerID=$ID";
	//echo $qry;
	mysqli_query($con,$qry);
	mysqli_query($con,"INSERT INTO `bloggernotification`(bloggerID,suba,type,subb,seen) VALUES('$ID','Admin',6,'xyz',0)");

}
echo '<script>location="adminbloggerlist.php";</script>';

?>