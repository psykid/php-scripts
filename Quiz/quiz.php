<html>
<head>
<title>quiz</title>
<link type ="text/css" rel="stylesheet" href="bootstrap/css/bootstrap.css"/>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<script>
function logout(){
window.location="logout.php";
}
</script>

<center><h2>Questions</h2></center>
<?php include("timeout.html");?>
<body onload = "begintimer()">
<h5>
<script src="bootstrap/js/bootstrap.js"></script>
<?php 
	session_start();
	$user=$_SESSION['user'];
	echo "<center>".$user."</center>";
	if($user!=''):
		$arr=$_SESSION['order'];
		echo"<p><p>";
		echo"<form action='calculate.php' method='POST'>";
		include("questions.php");
		echo "<br><br>";
		echo"<center>";
		echo"<input type='submit' class='btn btn-warning' value='submit answers'>";
		echo "</form>";
		
?>

<br><br>
&nbsp;&nbsp
<input type="button" class="btn btn-info" value="logout" onclick="logout();" />
</center>
</h5>
</body>
<?php
elseif($user==''):
	header("Location: login.php");
	
	endif;
?>
</html>