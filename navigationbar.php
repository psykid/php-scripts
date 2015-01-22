<!---<html>
<title>try</title>
<style>
ul {
    list-style-type: none;
	background-color: #dddddd;
    margin: 0;
    padding: 0;
	width=20%;
	height=100%;
}

a {
    display: block;
	opacity: 1;
	width=20%;
	height=100%;
    background-color: #dddddd;
}
li {
	float=left;
	
}
</style>
<?php //session_start();
	//$teacher_list= $_SESSION['teachers'];
	/*$teacher_list=array("hello","world","this ","is ","future");
	echo "<ul>";
	for($i=0;$i<count($teacher_list);$i++)
	{
		echo "<li><a href='index.php'>$teacher_list[$i]</a></li><br>";
	}
	echo "</ul>";*/
	?>
</html>--->
<!DOCTYPE html>
<html>
<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
	width: 125px;
	height: 500px;
	background-color: #98bf21;
}

a:link, a:visited {
    display: block;
    font-weight: bold;
    color: #FFFFFF;
    width: 120px;
    text-align: center;
    padding: 4px;
    text-decoration: none;
    text-transform: uppercase;
}

a:hover, a:active {
    background-color: #7A991A;
}
</style>
</head>
<body>

<ul>
  <li><a href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li><br><br>
</ul>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
	session_start();

	}
?>
</body>
</html>
