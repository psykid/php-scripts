<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['but1'])){
        t1();
    }elseif(isset($_POST['but2'])){
        t2();
    }
	}

    function t1()
    {
       echo "The t1 function is called.";
    }
    function t2()
    {
       echo "The t2 function is called.";
    }

?>

<html>
<head>
<title>Test</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
<input type="submit" value="Click1" name="but1">
<input type="submit" value="Click2" name="but2">
</form>
</body>
</html>