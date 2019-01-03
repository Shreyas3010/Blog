<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.a1
{
	margin-top:50px;
	margin-left:60px;
    width: 160px;
	height:50px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    background-image: url('');
	background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

.a1:focus 
{
    width: 700px;
}
.b1{
	margin-top:70px;
	width:160px;
	height:50px;
	padding: 12px 20px 12px 10px;
	background-color:red;
	font-size:20px;
	border:none;
	color:white;
	font-style: oblique;
	font-weight: bold;
	font-variant: small-caps;
	opacity:.6;
	
}
::placeholder {
	font-style: oblique;
	font-weight: bold;
	font-size:1.2em;
	color:red;
	font-variant: small-caps;
}

</style>
</head>
<body>
<form action="searchresult.php" target="target1" method="POST">
  <center><input class="a1" type="text" name="search" placeholder="Search.. "><button class="w3-large b1" type="submit">Search</button></center>
</form>
<div><iframe style="border:none;" src="bloglist.php" width="100%" height="80%" name="target1"></iframe></div>

</body>
</body>
</html>