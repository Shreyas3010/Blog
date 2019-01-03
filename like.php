<?php
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"blog")or
        mysqli_query($con,"CREATE DATABASE blog");
		$blogID=$_POST['blogID'];
		$bloggerID=$_POST['bloggerID'];
			$title=$_POST['title'];
		$q1="INSERT INTO `bloggernotification`(bloggerID,suba,type,subb,seen) VALUES('$bloggerID','xyz',7,'$title',0)";
		mysqli_query($con,$q1);
		$result=mysqli_query($con,"SELECT * FROM liketable WHERE blogID=$blogID");
		$n=mysqli_fetch_array($result);
		$cnt=$n['likes'];
		$cnt++;
		mysqli_query($con,"UPDATE liketable SET likes='$cnt' WHERE blogID=$blogID");
		echo '<script>
  location="bloglist.php";
  </script>'
?>