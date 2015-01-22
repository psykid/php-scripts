<?php
session_start(); 
 $_SESSION['name'] = $_POST['Name']; // store name
 
 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>

<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<meta name="author" content="Toadums" />

	<title>REI Consultants Time Sheet</title>

	<script language="JavaScript" src="ts_picker.js">

	//Script by Denis Gritcyuk: tspicker@yahoo.com
	//Submitted to JavaScript Kit (http://javascriptkit.com)
	//Visit http://javascriptkit.com for this script

	</script>
</head>

<body bgcolor="#CCFFFF">


<?php
#save log in information for server
$username=
$password=
$database=

?>

<!-- connecting to sql server-->

<?php
mysql_connect("server",$username,$password) or die ("Unable to connect to server");
@mysql_select_db($database) or die("Unable to select database");



if(isset($_POST['submit'])) {
$Name= $_SESSION['name'];
$Date=$_POST['Date'];
$Hours=$_POST['Hours'];
$Phase=$_POST['Phase'];
$ProjectID=$_POST['ProjectID'];
$ProjectName=$_POST['ProjectName'];
$Description=$_POST['Description'];
$Client=$_POST['Client'];
$Type=$_POST['Type'];


$query1 = "INSERT INTO tblTimesheet VALUES ('','$Name', '$Date','$Hours','$Phase','','$ProjectID','$Description')" ;
#$query2 = "INSERT INTO tblProjects VALUES('$ProjectID','$PName', '$Client', '$Type' )";

if(($results = mysql_query($query1))){#&&($results = mysql_query($query2))) {
echo '<font color="green">Data successfully added</font>';
} else {
die('<font color="red">Error: '.mysql_error().'</font>');
   	}
?>



<form name ="form1" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
<table border="0">
<tr><td align="right" >Name: </td><td colspan="2"><select name="Name"><option value=""></option><option value="Paul">Paul</option><option value="Ed">Ed</option></select></td></tr>
<tr><td align="right" width="20%">Date: </td><td colspan="2"><input type="text" name="Date"/></td>
<td><a href="javascript:show_calendar('document.form1.Date', document.form1.Date.value);">
<img src="cal.gif" width="16" height="16" border="0"></a></td></tr>  <!-- this adds the calendar icon which will allow people to pick dates-->
<tr><td align="right" >Client: </td><td colspan="2"><input type="text" name="Client"/></td></tr>
<tr><td align="right" >ProjectID: </td><td colspan="2"><input type="text" name="ProjectID"/></td>
<td align="right" >Name: </td><td colspan="2"><select name="Name"><option value=""></option><option value="Paul" <?php if($_SESSION['name']=='Paul') echo 'selected="selected"'; ?> >Paul</option><option value="Ed" <?php if($_SESSION['name']=='Ed') echo 'selected="selected"'; ?> >Ed</option></select></td></tr> <!-- button to auto fill Project fields -->
<tr><td align="right" >ProjectName: </td><td colspan="2"><input type="text" name="ProjectName"  /></td></tr>
<tr><td align="right" >Phase: </td><td colspan="2"><input type="text" name="Phase"/></td></tr>
<tr><td align="right" >Hours: </td><td colspan="2"><input type="text" name="Hours"/></td></tr>
<tr><td align="right" >Description: </td><td colspan="2"><input type="text" name="Description"/></td></tr>

<tr><td align="right" >Type: </td><td colspan="2"><input type="text" name="Type"/></td></tr>

<tr><td align="right">Submit:</td><td colspan="2"><input type="submit" name="submit" value="new" /></td></tr>
</table>
</form>

<?php

if(isset($_POST['projInfo'])) {

$ProjectID=$_POST['ProjectID'];	
$Name=$_SESSION['name'] ; 
$Date=$_POST['Date']; 


$Pname = mysql_query("SELECT ProjectName FROM tblProjects WHERE ProjectID = '$ProjectID'");
$NameRow = mysql_fetch_row($Pname);

$Pclient = mysql_query("SELECT Client FROM tblProjects WHERE ProjectID = '$ProjectID'");
$ClientRow = mysql_fetch_row($Pclient);

$PType = mysql_query("SELECT Type FROM tblProjects WHERE ProjectID = '$ProjectID'");
$TypeRow = mysql_fetch_row($PType);


?>

<script type="text/javascript">
function ChangeMe(){
document.form1.ProjectID.value = "<?php echo $ProjectID;?>"; 
document.form1.Name.value = "<?php echo $Name;?>"; 
document.form1.Date.value = "<?php echo $Date;?>"; 
document.form1.Hours.value = "<?php echo $Hours;?>"; 
document.form1.Phase.value = "<?php echo $Phase;?>"; 
document.form1.Description.value = "<?php echo $Description;?>"; 

document.form1.ProjectName.value = "<?php echo $NameRow[0];?>"; 
document.form1.Client.value = "<?php echo $ClientRow[0];?>"; 
document.form1.Type.value = "<?php echo $TypeRow[0];?>"; 
}

</script>

<?php
}
echo "<SCRIPT LANGUAGE='javascript'>ChangeMe();</SCRIPT>";
?>

<?php
mysql_close();
?>

</body>
</html>