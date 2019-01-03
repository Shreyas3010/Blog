<?php
session_start();
?>
<html>
<style>
.button {
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
	margin-left:1370px;
	border-radius: 10px;
}

.a1{
	margin-left:550px;
	font-size:35px;
	font-weight: bold;
	}
.button1 {
    background-color: white; 
    color: black; 
    border: 2px solid #f44336;
}

.button1:hover {
    background-color: #f44336;
    color: white;
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
</style>
<body>
<!--<a href="customerhomeedit.php"><button class="button button1">Edit</button><a>-->
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
    <font class='a1'>No Profile Image</font>
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
</body>
</html>