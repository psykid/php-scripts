<?php
echo "from print <br>";
foreach($answers as $out=>$in){
	//out = Response1,2,3... in = array()....
	foreach($in as $key=>$value){
		echo $key."=>".$value."<br>";
	}
	echo "<br><br>";
}
?>