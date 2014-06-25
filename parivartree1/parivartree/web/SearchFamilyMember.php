<?php
include_once('externconfig.php');

$SearchString = $_REQUEST['SearchParameter'];

$key = explode(' ', $SearchString);

$resultarr = array('0'=>'satish','1'=>'anup','2'=>'kubulu','3'=>'reshmi','4'=>'vinayak','5'=>'iqbal');
$optarr = array();
for($i=0;$i<count($resultarr);$i++){
	array_push($optarr, $resultarr[$i]);	
}

echo json_encode($resultarr);
 
?>
