<?php 
	require($_SERVER["DOCUMENT_ROOT"]."/config/db_conf.php");
	$con=mysqli_connect($db_host,$db_user,$db_password);
	if(!$con)
	{
		die("connection failed");
	}
	echo "<h2>connection established</h2>";

	$db_selected = mysqli_select_db($con,$db_name);

	if (!$db_selected)
	{
    die ('Can\'t use foo : ' . mysql_error());
	}
	
	$query = "select * from counter";
	
	$result = mysqli_query($con,$query) or die(mysql_error());
	$row = mysqli_fetch_row($result);
	$views=$row[0];
	$views++;
	
	$query = "update counter set num_views=$views";
	mysqli_query($con,$query) or die(mysql_error());
	
	echo "this page has been viewed ".$views. " times<br>";
?>
