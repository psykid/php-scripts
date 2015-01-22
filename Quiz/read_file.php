<html>
<head><title>qstns</title>
</head>
<body>
Questions <br>
<?php
	///new
	$file = fopen("1 (559).pdf","r");
	$i=0;
	$questions=array();
	while(!feof($file))
	  {
	  $str=fgets($file);
	  if(strlen($str)>2)
	  {$questions[]=array(
						'question'=>$str,
						//'options'=>array()
						);
		$j=0;
		$options=htmlspecialchars(fgets($file),ENT_QUOTES);
		$ans=array();
		while(strlen($options)>2)
			{
			//$new=htmlspecialchars($options,ENT_QUOTES);
			$ans=array_merge((array)$ans,(array)$options);
			$options=fgets($file);
			}
		//$questions[$i]['options']=$ans;
		$questions[$i]=array_merge($questions[$i],$ans);
		$i++;}
	  }
	  echo "<pre>";
	  print_r ($questions);
	  echo "</pre>";
	  $_SESSION['question']=$questions;
	fclose($file);
	///close new

	?>
</body>
</html>