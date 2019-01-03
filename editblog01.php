<?php

session_start();
#echo '<script>alert("Ok !");</script>';
$title=$_POST['title'];
$subject=$_POST['sub'];
$body=$_POST['con'];
$bID=$_POST['bID'];
#$slink=$_POST['slink'];
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"blog")or
        mysqli_query($con,"CREATE DATABASE blog");

	   if($title!=NULL)
	   {
$qry = "UPDATE blogs SET title='$title', subject ='$subject', body ='$body' WHERE blogID=$bID;";
//echo $qry;
 if(mysqli_query($con,$qry))
{
	$newr=mysqli_query($con,"SELECT * FROM blogs WHERE blogID=$bID");
	$nr=mysqli_fetch_array($newr);
	$nbid=$nr['authorID'];
	mysqli_query($con,"INSERT INTO `blogggernotification`(bloggerID,suba,type,subb,seen) VALUES('$nbid','Admin',2,'$title',0)");
	echo "INSERT INTO `bloggernotification`(bloggerID,suba,type,subb,seen) VALUES($nbid,'Admin',2,'$title',0)";
	echo '<script>alert("Successfully edited !!");location="adminbloglist.php";</script>';
}
else
{
   	echo '<script>alert("Error !! Sorry please try again.");location="adminbloglist.php";</script>';
} 	
}
?>


