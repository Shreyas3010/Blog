<?php
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"blog")or
        mysqli_query($con,"CREATE DATABASE blog");
$ID=$_POST["id"];
$qry="UPDATE blogger SET new=0,permission=1 WHERE bloggerID=$ID";
//echo $qry;
mysqli_query($con,$qry);
mysqli_query($con,"INSERT INTO `bloggernotification`(bloggerID,suba,type,subb,seen) VALUES('$ID','Admin',6,'xyz',0)");
echo "INSERT INTO `bloggernotification`(bloggerID,suba,type,subb,seen) VALUES('$ID','Admin',6,'xyz',0)";
echo '<script>location="adminhome.php";</script>';

?>