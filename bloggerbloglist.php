<html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.dnt{
	float:right;
	margin-top:50px;
	margin-right:10px;
}

.s1{
	margin-left:140px;
	font-size:25px;
	
}
.s2{
	margin-left:140px;
	font-size:20px;
	
}
.b{

  width: 13%;
  padding: 10px;
  font-family: "Roboto";  
  outline-color:black;  
  outline-style:groove;
  margin-left:140px;
  
}
.b1{

  width: 35%;
  padding: 10px;
  font-family: "Roboto";  
  outline-color:black;  
  outline-style:groove;
  
}
.button3 {
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 11px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
    background-color: white; 
    color: black; 
    border: 2px solid #f44336;
}
.button3:hover {
    background-color: #f44336;
    color:white;
	border: 2px solid white;
}
</style>
<body>

<?php 
$con=mysqli_connect("127.0.0.1","root","")or
    die("Could not connect: " . mysql_error());
//Select Database
mysqli_select_db($con,"blog")or
 die("Could not select db: " . mysql_error());
	session_start();
	$BID=$_SESSION["BID"];
	$result=mysqli_query($con,"SELECT * FROM blogs WHERE 1");
	$i=mysqli_num_rows($result);
    if($i)
	{
		?>
		<center><h1 style="margin-top:100px;font-size:60px;background-color:black;color:white;">Blogs</h1></center>
		<?php
	}
	while($n=mysqli_fetch_array($result))
	{
		$aID=$n["authorID"];
		$blogID=$n['blogID'];
		$title=$n["title"];
		if($n["authorID"]==$BID)
		{
			
		}
		else
		{
		
			?>
	<br>
	<br>
<font style="margin-left:30px;margin-top:50px;font-size:50px;background-color:black;color:white;" ></abbr>  <?php echo $n["username"]; ?></abbr></font><font style="margin-left:100px;margin-top:50px;font-size:50px;background-color:black;color:white;" >  <?php echo $n["title"]; ?></font>
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
    <font size="10" class='a1'><center>No Image</center></font>
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
		?>
		<br>
		<br>
		<br>
		<br>
		<?php
		echo "<div>
		<img style='margin-left:300px;' src='data:image/png;base64,".base64_encode($n["imagetmp"])."' alt='Profile Picture' class='avatar' >
		</div>";	
	}
	
  ?>
  <br>
  <br>
  <br>
<p><font class="a">-</font><font size="6" >  <?php echo $n["subject"]; ?></font></p>
<p><font class="a"></font><font size="5">  <?php echo $n["body"]; ?></font></p>
<?php
		$q6="SELECT * FROM liketable WHERE blogID=$blogID";
		//echo $q6;
		$r6=mysqli_query($con,$q6);
		$n6=mysqli_fetch_array($r6);
		//echo "aa";
		//echo $n6['likes'];
		//echo "aa";
?>
<form action="bloggerlike.php" method="POST"><input type="hidden" name="bloggerID" value=<?php echo $aID ;?> ><input type="hidden" name="blogID" value=<?php echo $blogID ;?> ><input type="hidden" name="title" value=<?php echo $title ;?> ><button style="margin-left:140px;border:none;background-color:Transparent;"><i class="glyphicon glyphicon-heart" style="font-size:48px;color:red;text-shadow:2px 2px 4px black;"></i><font style="margin-left:10px;font-size:45px;"><?php echo $n6['likes'] ?></font></button></form>
<div><form action="bloggerwritecomment.php" method="POST"><input type="hidden" name="bloggerID" value=<?php echo $aID ;?> ><input type="hidden" name="blogID" value=<?php echo $blogID ;?> ><input type="hidden" name="title" value=<?php echo $title ;?> ><input type="text" name="username" placeholder="Name" class="b" required ><input type="text" name="comment" placeholder="Comment here" class="b1" required ><button class="button3">Comment</button></form></div>
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
	}
?>
</body>
</html>

</body>
</html>