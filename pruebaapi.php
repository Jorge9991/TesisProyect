<?php 
$response = array();
$now = new DateTime(null, new DateTimeZone('America/New_York'));
$now->setTimezone(new DateTimeZone('Europe/London'));    // Another way

$response['datetime'] = $now->format("Y-m-d\TH:i:sO");
die(json_encode($response));
?>
