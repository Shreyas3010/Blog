<?php
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"blog")or
        mysqli_query($con,"CREATE DATABASE blog");
		$username=$_POST['username'];
		$blogID=$_POST['blogID'];
		$bloggerID=$_POST['bloggerID'];
		$tt=$_POST['title'];
		$cm=$_POST['comment'];
		$q1="INSERT INTO `bloggernotification`(bloggerID,suba,type,subb,seen) VALUES('$bloggerID','$username',8,'$tt',0)";
		mysqli_query($con,$q1);
		echo $q1;
		$q2="INSERT INTO `commenttable`(username,blogID,comment) VALUES('$username','$blogID','$cm')";
		mysqli_query($con,$q2);
		echo $q2;
		echo '<script> alert("Done !");
  location="bloglist.php";
  </script>'

?>