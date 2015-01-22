<html>
<script>
//window.alert("this is start of the script");
var arr= "hello";
var arrays=<?php
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
		$myarray[]=$row['name'];
	}
echo json_encode($myarray);
?>;
window.alert(arrays[0]);

 var myvar = "Hey Buddy";

"<%Session['temp'] = "'+myvar+'"; %>";
alert('<%=Session["temp"] %>');
</script>
</html>