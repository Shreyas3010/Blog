<?php
session_start();
$nbid=$_POST['following'];
$cnt=$_POST['cnt'];
//echo $cnt;
$cnt++;
$BID=$_SESSION['BID'];
$folr=$_SESSION['USERNAME'];
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"blog")or
        mysqli_query($con,"CREATE DATABASE blog");
		
		mysqli_query($con,"INSERT INTO `bloggernotification`(bloggerID,suba,type,subb,seen) VALUES('$nbid','$folr',3,'xyz',0)");
		//echo "INSERT INTO `bloggernotification`(bloggerID,suba,type,subb,seen) VALUES('$nbid','$folr',3,'xyz',0)";
		mysqli_query($con,"INSERT INTO followtable (follower,following) VALUES('$BID','$nbid')");
	//	echo "INSERT INTO followtable (follower,following) VALUES('$BID','$nbid')";
		mysqli_query($con,"UPDATE blogger SET follower='$cnt' WHERE bloggerID=$nbid");
		//echo "UPDATE blogger SET follower='$cnt' WHERE bloggerID=$nbid";
		echo '<script>
    alert("Follow!");
  location="bloggerbloggerlist.php";
  </script>'

		
		
?>