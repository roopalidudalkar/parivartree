<?php

		$resultArray = array();
		$resultArray['count'] = 6;
        $resultArray['8'][0]['attachto'] = 7;
		$resultArray['8'][0]['as'] = 1;
		$resultArray['7'][0]['attachto'] = 6;
		$resultArray['7'][0]['as'] =2;
		$resultArray['7'][1]['attachto'] = 9;
		$resultArray['7'][1]['as']= 2;
        $resultArray['6'][0]['attachto'] =4;
        $resultArray['6'][0]['as'] =1;
        $resultArray['4'][0]['attachto'] =5;
        $resultArray['4'][0]['as'] =2;
        $resultArray['4'][1]['attachto'] =3;
        $resultArray['4'][1]['as'] =3;
        $resultArray['3'][0]['attachto'] = 1;
		$resultArray['3'][0]['as'] =2;
		$resultArray['1'][0]['attachto'] = 2;
		$resultArray['1'][0]['as'] =3;
		$resultArray['1'][1]['attachto'] = 10;
		$resultArray['1'][1]['as']= 1;


echo json_encode($resultArray); 

?>
