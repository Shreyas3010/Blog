<?php
session_start();
$BID=$_SESSION['BID'];

$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
    mysqli_select_db($con,"blog")or
        mysqli_query($con,"CREATE DATABASE blog");
mysqli_query($con,"DELETE FROM bloggernotification WHERE bloggerID=$BID AND seen=1");
echo "DELETE FROM bloggernotification WHERE bloggerID=$BID AND seen=1";
session_destroy();
echo '<script>
    alert("Logout!");
    location="index.php";
  </script>'

?>
