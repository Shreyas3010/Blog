<?php

session_start();
#echo '<script>alert("Ok !");</script>';
$bID=$_SESSION['BID'];
$username=$_SESSION['USERNAME'];
$title=$_POST['title'];
$subject=$_POST['sub'];
$body=$_POST['con'];
#$slink=$_POST['slink'];
$imagename=$_FILES['blogimage']['name'];
$d=date("Y-m-d");
date_default_timezone_set("Asia/Kolkata");
$t=date("H:i:sa");
$imagetmp=addslashes(file_get_contents($_FILES['blogimage']['tmp_name']));
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"blog")or
        mysqli_query($con,"CREATE DATABASE blog");

	   if($title!=NULL)
	   {
$qry = "INSERT INTO `blogs`(authorID,username,title,subject,body,date,time,imagetmp,imagename) VALUES('$bID','$username','$title','$subject','$body','$d','$t','$imagetmp','$imagename')";
#echo $qry;
if(mysqli_query($con,$qry))
{
	mysqli_query($con,"INSERT INTO `adminnotification`(suba,type,subb,seen) VALUES('$username',3,'$title',0)");
	$q5="SELECT * FROM blogs WHERE authorID=$bID AND title='$title'";
		$r5=mysqli_query($con,$q5);
		$n5=mysqli_fetch_array($r5);
		$blogID=$n5['blogID'];
	$q10="INSERT INTO `liketable`(blogID,likes) VALUES('$blogID',0)";
	mysqli_query($con,$q10);
	echo '<script>alert("Successfully uploaded!!!");location="bloggerhome.php";</script>';
}
else
{
   	echo '<script>alert("Error !! Sorry please write it again.");location="writeablog.php";</script>';
}	
}
?>
