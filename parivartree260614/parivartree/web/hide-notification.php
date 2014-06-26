<?php
include_once('externconfig.php'); // including the database connections

	$userid = $_REQUEST['userid']; // userid from ajax
	$type = $_REQUEST['type']; // type message or notification
	if($type == 'notification'){
		$updateNotif = "update parivar_notification set readstatus = 1 where userid  =".$userid;
		mysql_query($updateNotif);
			echo "success";
	}elseif($type == 'message'){
	 	$updateMessage = "update chat set recd = 1 where msgto  =".$userid;
		mysql_query($updateMessage);
			echo "success";
	}
?>
