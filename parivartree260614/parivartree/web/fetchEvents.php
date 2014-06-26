<?php
include_once('externconfig.php');

$sessionid = $_REQUEST['userid'];
$eventid = $_REQUEST['eventid'];
$selectEvents = "SELECT a.firstname, a.lastname, e.eventname, e.eventdescription, e.eventhash, e.event, e.eventdate, e.author, ea.location FROM parivar_event e JOIN parivar_account a ON a.userid = e.author JOIN parivar_eventtoaddressrel ea on ea.eventid = e.id where e.id=".$eventid;
$EventQuery = mysql_query($selectEvents);
while($data = mysql_fetch_assoc($EventQuery))
{
	
	$opt =	'<div class="row event-container-block">
				<div class="event-cover"></div>
				<div class="event-middle-header">
				<div class="col-md-5"></div>';
					
					if($data['author']!=$sessionid)
					{
						$opt .= '
						<div class="col-md-2 clear-right"><button type="button" class="btn btn-primary btn-sm btn-block">JOIN</button></div>
						<div class="col-md-2 clear-right"><button type="button" class="btn btn-primary btn-sm btn-block">MAY BE</button></div>
						<div class="col-md-3 clear-right"><button type="button" class="btn btn-primary btn-sm btn-block">NOT AVAILABLE</button></div>';
					}
					
		$opt .=	'</div><h1>'.$data["eventname"].'</h1>
				<h2>'.$data["location"].'</h2>
				<h3>'.$data["evendate"].'</h3>
				<p>'.$data["eventdescription"].'</p>
				<div class="event-map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.2275254197884!2d77.647343!3d13.021178000000019!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1a37d169cc8d2c28!2sNetiApps+Software+Pvt+Ltd!5e0!3m2!1sen!2sin!4v1403442694410" width="100%" height="150" frameborder="0" style="border:0"></iframe></div>
				</div>';
		$opt .= '<div class="row joining"><h1>Joining</h1></div>';
		$opt .= '<div class="row joining"><h1>May Be</h1></div>';
		$opt .= '<div class="row joining"><h1>Declined</h1></div>';
		
		echo $opt;

	
}


?>
