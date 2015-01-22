<html>
<?php
require($_SERVER["DOCUMENT_ROOT"]."/config/db_conf.php");
	$con=mysqli_connect($db_host,$db_user,$db_password) or die("connection failed");
	
	mysqli_select_db($con,$db_name);
//echo "connection successful<br>";
$myarray=array();
$i=0;
$query ="select * from guest_book order by date desc";
	$result=mysqli_query($con,$query) or die(mysql_error()); 
	while($row=mysqli_fetch_assoc($result))
	{
		echo "myarray[".$i."]='".$row['name']."';";
		$i++;
		}
//echo 'var arr2 = '.json_encode($arr).';';
return $myarray;
?>
</html>