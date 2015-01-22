<html>
<?php
if($_POST){
    if(isset($_POST['insert'])){
        insert();
    }elseif(isset($_POST['select'])){
        select();
    }
}

    function select()
    {
       echo $_POST['select'];
    }
    function insert()
    {
       echo "The insert function is called.";
    }

?>
<body>
<form action="forms.php" method="POST">
    Textbox does nohin<input type="text" name="txt" />
	<table>
	<tr name='tr' value='hello'><input type="submit" class="button" id="insert" name="insert" value="insert" /></tr>
	<tr name='tr' value='world'><input type="submit" class="button" name="select" value="select1" /></tr>
	</table>
</form>
</html>