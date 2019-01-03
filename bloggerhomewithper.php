<?php
session_start();
if($_SESSION["PERMISSION"]>0)
{
	header("Location:bloggerhomewithper.php")or
	die("Could not select db: " . mysql_error());
}
else
{
	header("Location:bloggerhomewithoutper.php")or
	die("Could not select db: " . mysql_error());
}
?>