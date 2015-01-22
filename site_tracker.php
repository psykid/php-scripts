<html>
<h2>welcome to site tracker!</h2>
<?php
	echo "the unique ip's are: <br>";
	
	require($_SERVER["DOCUMENT_ROOT"]."/config/db_conf.php");
	$con=mysqli_connect($db_host,$db_user,$db_password);
	mysqli_select_db($con,$db_name);

$query="select *, count(*) from traker group by IP";
$result= mysqli_query($con,$query) or die("query failes");

while($row=mysqli_fetch_assoc($result))
{
	echo $row['IP'].'<br>';
}
?>
</html>