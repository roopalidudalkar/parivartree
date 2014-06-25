<?php 
/* initializing the database connection */

$con = mysql_connect("localhost","anup","tripleseven7");
if($con){
		mysql_select_db("parivartree",$con);
	
}else {
	die("error".mysql_error() );
}


?>
