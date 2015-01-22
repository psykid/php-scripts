<html>
<title>quiz</title>
<script>
function logout(){
window.location="logout.php";
}
</script>
<center><h2>Questions</h2></center>
<?php 
	session_start();
	$user=$_SESSION['user'];
	if($user!=''):
		$arr=$_SESSION['order'];
		echo"<p><p>";
		echo"<form action='calculate.php' method='POST'>";
		include("questions.php");
		echo "<br><br>";
		echo"<center>";
		echo"<input type='submit' value='submit answers'>";
		echo "</form>";
		
?>
<body>
<br><br>
&nbsp;&nbsp
<input type="button" value="logout" onclick="logout();">
</center>
<body>
<?php
elseif($user==''):
	header("Location: login.php");
	
	endif;
?>
</html>