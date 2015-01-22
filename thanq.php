<html>
<title>thanq</title>
<center><h3>Thanq for ur feedback!</h3></center>
<?php
echo "the values entered is <br>";
$q1=$_POST["p1_q1"];
$q2=$_POST["p1_q2"];
$total=3*($q1+$q2);
$cg=$total/2;
$table=$_POST["prof"];
echo $table." ".$q1." ".$q2;
require($_SERVER["DOCUMENT_ROOT"]."config/db_conf.php");
$con= mysqli_connect($host,$user,$password)or die ("connection failed");
echo "connection successful<br>";
mysqli_connect_db($con,$db_name) or die(mysql_error());
$query= "insert into '$table'(ID,q1,q2,total,cg) values(NULL,'$q1','$q2','$total',$cg)";
mysqli_query($con,$query) or die(mysql_error());
?>
</html>