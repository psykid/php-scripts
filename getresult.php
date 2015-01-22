<html>
<style>
#para1 {
    text-align: center;
    color: red;
	
} 
</style>
<script>
function change(){
var ele = document.getElementsByName('para1');
var i = ele.length;
for (var j = 0; j < i; j++) {
    if (ele[j].checked) { //index has to be j.
		alert('radio '+ele[j].value+' checked'); 
    }
}
}
</script>
<body>
<form method="post" id="myform" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
<?php
//$age=array("Peter"=>"35","Ben"=>"37","Joe"=>"43");
$arr=array("hello","world","this","is","future");
echo "<table style='background-color:#DDDFFF;'>";
foreach($arr as $x) {
  echo "<tr> <td> $x<input type='radio' id='para1' name='para1' value='$x' onChange=change();></td>
		";
}
echo "<td> <input type='submit' name='teacher' value='submit'></td></tr>";
if($_SERVER['REQUEST_METHOD']=='POST'){
session_start();
$_SESSION['current']=$_POST['teacher'];
echo $_POST['para1'];
$var = $_SESSION['current'];
echo " from if";
}
?> 
</table>
Txt box<input type="text" name="txt" placeholder="write something">
</form>
</body>
</html>