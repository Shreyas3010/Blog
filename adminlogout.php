<?php

session_start();
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"blog")or
        mysqli_query($con,"CREATE DATABASE blog");
$qry="UPDATE blogger SET new=0 WHERE new=1";
//echo $qry;
mysqli_query($con,$qry);
mysqli_query($con,"DELETE FROM adminnotification WHERE seen=1");
session_destroy();
echo '<script>
    alert("Logout!");
   location="index.php";
  </script>'

?>
