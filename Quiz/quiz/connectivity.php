<html>
<head><title>Welcome</title></head>
<header>Welcome to feedback form</header>
<body>
<?php 

if($_SERVER["REQUEST_METHOD"]=="POST"){

$user=$_POST["user"];
$pass=$_POST["pass"];
//echo "values enterd are $user and $pass :D";

//require($_SERVER["DOCUMENT_ROOT"]."/config/db_conf.php");
	$con=mysqli_connect("localhost","root","") or die("connection failed");
	echo "connection established<br>";
	$query="select * from students where Username='$user' and Pass='$pass'";
	mysqli_select_db($con,"test");
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($result);
	if(empty($row['Username']))
	{
		echo "<center>username or password is incorrect please check again and retry<br></center>";
	}
	else
	{	session_start();
		$_SERVER["session"]=$pass;
		echo "login successful<br>";
	}
	//header("Location: http://localhost:80/feedback/feedback.php");
	//header("Location: http://$_SERVER['DOCUMENT_ROOT'].'feedback.php'");
}
?>
</body>
</html>