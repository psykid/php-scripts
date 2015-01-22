<?php
include_once('read_file.php');

	$qstn="";
foreach ($questions as $qid => $qstn_opt) {
   foreach ($qstn_opt as $key => $value) {
      if($key=='question'&&$key!=0){
		echo "$value <br>";	
		//echo "<input type='radio' name='.$value.'>";
		$qstn=$value;
		}
	elseif($value!='') {
		
		echo $value."<input type='radio' name='.$qstn.'>";
		echo "<br><br>";
	}
		}
		
		echo "<br><br>";
	}
?>