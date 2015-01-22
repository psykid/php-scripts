<html>
<?php
	
	$conn=mysqli_connect("localhost","root","")or die("connection failed");
	mysqli_select_db($conn,'test');
	echo "connection established<br>";

	require('PHPExcel/IOFactory.php');
	require_once 'PHPExcel.php';
	
	$inputFileName = 'tut2.xls';
	$input2='ans.xls';
	
	/** Identify the type of $inputFileName **/ 
	$inputFileType = PHPExcel_IOFactory::identify($inputFileName); 
	$inputFileType2 = PHPExcel_IOFactory::identify($input2); 
	
	/** Create a new Reader of the type that has been identified **/ 
	$objReader = PHPExcel_IOFactory::createReader($inputFileType); 
	$objReader2 = PHPExcel_IOFactory::createReader($inputFileType2); 
	
	/** Load $inputFileName to a PHPExcel Object **/ 
	$objPHPExcel = $objReader->load($inputFileName);
	$objPHPExcel2 = $objReader->load($input2);
	
	$sheetname = 'sheet2';
	$sheet2='sheet1';
	/** Define a Read Filter class implementing PHPExcel_Reader_IReadFilter */ 
	class MyReadFilter implements PHPExcel_Reader_IReadFilter {

	public function readCell($column, $row, $worksheetName = '') {
	// Read rows 1 to 7 and columns A to E only 
	if ($row >= 1 && $row <= 200) { 
		if (in_array($column,range('A','Z'))) {
			return true; } } 
		return false; }
	} 
	/** Create an Instance of our Read Filter **/ 
	$filterSubset = new MyReadFilter();
	$filtersubset2= new MyReadFilter();
	
	/** Create a new Reader of the type defined in $inputFileType **/ 
	$objReader = PHPExcel_IOFactory::createReader($inputFileType);
	$objReader2 = PHPExcel_IOFactory::createReader($inputFileType2); 
	
	/** Tell the Reader that we want to use the Read Filter **/ 
	$objReader->setReadFilter($filterSubset); 
	$objReader2->setReadFilter($filtersubset2); 
	
	/** Load only the rows and columns that match our filter to PHPExcel **/ 
	$objPHPExcel = $objReader->load($inputFileName);
	$objPHPExcel2 = $objReader->load($input2);
	
	$sheet = $objPHPExcel->getSheet(1);
	$sheet2 = $objPHPExcel2->getSheet(0);
	//to get all the answers
	//ROW STARTS WITH 1 AND COLUMN WITH 0 (column,row)
	$i=0;$l=0;$row=1;$col=1;$true="";$count=0;
	$response=array();
	$answers=array();
	echo "<pre>";
	for($row=1;$sheet2->getCellByColumnAndRow(0,$row)->getValue()!="";$row++){
	$temp=$sheet2->getCellByColumnAndRow(0,$row)->getValue();
	if($true!=$temp){
		if($true!=""){
			$answers[$true]=$response;}
			$true=$temp;
			unset($response);
			$response=array();
			$count++;
			}
		for($col=1;$col<3;$col++){
			$temp=$sheet2->getCellByColumnAndRow($col++,$row)->getValue();
			$value=$sheet2->getCellByColumnAndRow($col++,$row)->getValue();
			$response[$temp]=$value;
		}
		
		//print_r($response);
	}
	$answers[$true]=$response;
	print_r($answers);
	echo "</pre>";
	
	//include_once("print.php");
	 $column="hello";
	 while($column!="")
	{
	$column= $sheet->getCellByColumnAndRow($i,1)->getValue();
	//echo $user." $i<br> ";
	if (strpos($column,'Response') === false) {
		$l++;
		}
		$i++;
	}
	$i-=1;
	$k=2;
	echo $l." is l value<br>";
	//echo $j." is j value<br>";
	//do{
	for($j=$l-1;$j<$i;$j++)//for($j=$l-1;$j<$i;$j++)
	{
		$response=$sheet->getCellByColumnAndRow($j,$k)->getValue();
		$number=$sheet->getCellByColumnAndRow($j,1)->getValue();
		foreach($answers[$number] as $out=>$in){
			//out = 1101 in=20,10,5....
			if($out==$response)
				echo "<br>true response $response with $in -> $number<br>";
			}
		//print_r ($answers[$number]);
		}
		$k++;
		echo "<br>";
	//}while($response!="")  
?>
</html>	