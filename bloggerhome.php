<?php
session_start();

$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
//Select Database
mysqli_select_db($con,"blog")or
 die("Could not select db: " . mysql_error());
	$BID=$_SESSION["BID"];
	$r1=mysqli_query($con,"SELECT * FROM blogger WHERE bloggerID=$BID ");
	$n1=mysqli_fetch_array($r1);
	$r3=mysqli_query($con,"SELECT * FROM followtable WHERE following=$BID ");
	$n3=mysqli_num_rows($r3);
	$r2=mysqli_query($con,"SELECT * FROM followtable WHERE follower=$BID ");
	$n2=mysqli_num_rows($r2);
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
.s1{
	margin-left:140px;
	font-size:25px;
	
}
.s2{
	margin-left:140px;
	font-size:20px;
	
}
.btt1 {
    background-color: #008CBA; /* Green */
    border: none;
    color: white;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
	font-variant: small-caps;
}
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

.avatar {
    width:50%;
    border-radius:50%;
}
.a{
	margin-left:550px;
	font-size:25px;
	font-weight: bold;
	}
.b{
	font-size:25px;
	
}
.c{
	font-size:25px;
	margin-left:660px;
}

.a1{
	margin-left:550px;
	font-size:35px;
	font-weight: bold;
	}
.btn{
    background-color: DodgerBlue;
    border: none;
    color: white;
    padding: 12px 16px;
    font-size: 30px;
	width:200px;
    cursor: pointer;
	margin-top:30px;
}

/* Darker background on mouse-over */
.btn:hover {
    background-color: RoyalBlue;
}

.dnt{
	float:right;
	margin-top:50px;
	margin-right:10px;
}
</style>
<body>
<!--<a href="customerhomeedit.php"><button class="button button1">Edit</button><a>-->
<center><button class="btt1">Follower <?php echo $n3; ?></button>
<button class="btt1" style="margin-left:100px;">Following <?php echo $n2;?></button>
</center><br><br>
	<?php
	if(empty($_SESSION["IMAGECONTENT"]))
	{
	?>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
    <font  class='a1'><center>No Image</center></font>
	<br>
	<br>
	<br>
	<br>
	<?php
	}
	else
	{
		echo "<div class='imgcontainer'>
		<img src='data:image/png;base64,".base64_encode($_SESSION["IMAGECONTENT"])."' alt='Profile Picture' class='avatar' >
		</div>";	
	}
  ?>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
<p><font class="a">Name :</font><font class="b">  <?php echo $_SESSION["NAME"]; ?></font></p>
<p><font class="a">Email :</font><font class="b">  <?php echo $_SESSION["EMAIL"]; ?></font></p>
<?php 
	$result=mysqli_query($con,"SELECT * FROM blogs WHERE authorID=$BID ");
	$i=mysqli_num_rows($result);
    if($i)
	{
		?>
		<center><h1 style="margin-top:100px;font-size:60px;background-color:black;color:white;">Blogs</h1></center>
		<?php
	}
	while($n=mysqli_fetch_array($result))
	{
	?>
	<br>
	<br>
<font style="margin-top:50px;font-size:50px;background-color:black;color:white;" >  <?php echo $n["title"]; ?></font>
	<div class="dnt"><font size="5" style="color:#501B1D;"><?php echo $n["date"]; ?> <sup><?php echo $n["time"]; ?></sup></font></div>
	<?php
		if(empty($n["imagetmp"]))
	{
	?>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
    <font class='a1'>No Image</font>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<?php
	}
	else
	{
		echo "<div>
		<img style='margin-left:300px;' src='data:image/png;base64,".base64_encode($n["imagetmp"])."' alt='Profile Picture' class='avatar' >
		</div>";	
	}
	
  ?>
  <br>
  <br>
  <br>
<p><font class="a">-</font><font class="b">  <?php echo $n["subject"]; ?></font></p>
<p><font class="a"></font><font class="b">  <?php echo $n["body"]; ?></font></p>
<form action="personalblogdeleteedit.php" method="POST"><input name="bID" value=<?php echo $n["blogID"];?> type="hidden"><input type="hidden" name="aID" value=<?php echo $n["authorID"];?> ><button style="margin-left:450px;" class="btn" name="delete" type="submit"><i class="fa fa-trash"></i> Delete</button><button style="margin-left:100px;" class="btn" name="edit" type="submit"><i class="fa fa-bars"></i> Edit</button></form>
<?php
		$blogID=$n['blogID'];
		$q6="SELECT * FROM liketable WHERE blogID=$blogID";
		//echo $q6;
		$r6=mysqli_query($con,$q6);
		$n6=mysqli_fetch_array($r6);
		//echo "aa";
		//echo $n6['likes'];
		//echo "aa";
?>
<button style="margin-left:140px;border:none;background-color:Transparent;"><i class="glyphicon glyphicon-heart" style="font-size:48px;color:red;text-shadow:2px 2px 4px black;"></i><font style="margin-left:10px;font-size:45px;"><?php echo $n6['likes'] ?></font></button>
<details>
<summary class="s1"><b>Comments</b></summary>
<?php
		$blogID=$n["blogID"];
		$q5="SELECT * FROM commenttable WHERE blogID=$blogID";
		$r5=mysqli_query($con,$q5);
		while($n=mysqli_fetch_array($r5))
		{
			
			?>
				<p class="s2"><?php echo $n['username'] ; ?> - <?php echo $n['comment'] ; ?>.</p>		
		<?php
		}
		
?>
</details>

<hr style="background-color:black;margin-top:50px;margin-left:20px;" size="10">
	<?php
	}
?>
</body>
</html>


