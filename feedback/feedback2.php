<html>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
}

li {
    float: center;
	width: 20%;
}

a:link, a:visited {
    display: block;
    width: 100%;
	height: 5%;
    font-weight: bold;
    color: #333FFF;
    background-color: #dddfff;
    text-align: left;
    padding: 4px;
    text-decoration: none;
    text-transform: uppercase;
}

a:hover, a:active {
    background-color: #cccFFF;
	color: #444fff;
	text-align: center;
}
</style>
<script>
function alrt(lolit)
{window.alert(lolit);
<?php session_start();
$_SESSION['current_teacher']= "<script>document.write(lolit)</script>";?>
}
</script>
<body>
<form method="post" accept-charset=utf-8 action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<?php 
$arr=array("ello","world","this ","is ","future");
$i=0;
echo "<ul>";
$page="index.php";
foreach($arr as $x){
echo "<li><a href='' onclick='alrt(id);' id='$x'>$x</a></li><br>";
echo "<input type='text' name='arra[]' value='$x' style='display:none;'>";
echo "NAME: <input type='text' name='arra[]' value='$x.name'>
	EMAIL: <input type='text' name='arra[]' value='$x.email'><br><br>";
}
echo "</ul><br><br>";
?><center>
<input type="submit" value="click"></center>
</form>
<?php if($_SERVER["REQUEST_METHOD"]=="POST"){
session_start();
$lol= $_POST['arra'];
$pot=count($lol)/count($arr);
//for($i=0;$i<count($lol);$i+=($pot-1))
{
$split=(array_chunk($lol,$pot,false));
$_SESSION['feedback']=$split;
print_r ($split[count($arr)-1]);
echo count($split)."<br><br>";
}
}?>
</body>
</html>