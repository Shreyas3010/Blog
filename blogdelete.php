<?php
//echo $_POST["bID"];
//echo "</br>";
//echo $_POST["aID"];
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
//Select Database
$bID=$_POST['bID'];
mysqli_select_db($con,"blog")or
 die("Could not select db: " . mysql_error());
	$result=mysqli_query($con,"DELETE FROM blogs WHERE blogID=$bID");
	echo '<script>alert("Deleted !");location="adminbloglist.php";</script>';
?>

<form action="blogedit.php" method="POST"><input name="bID" value=<?php echo $n["blogID"];?> type="hidden"><input type="hidden" name="aID" value=<?php echo $n["authorID"];?> ></form>