<?php
include 'config.php';
if (isset($_POST['entryid'])) {
	$entryid = ($_POST['entryid']);
	$username = $_SESSION['username'];
	$query = "DELETE FROM `docappointment` WHERE `appointmentid` = '$entryid' and `username`='$username';";
	$results = $mysqli->query($query);
	if($results){
		$_SESSION['alertmessage'] = 'your appointment is successfully deleted';
		header("Location: docmanageappointment.php"); die();
	}else{
		$_SESSION['alertmessage'] = "Error. sql Server connecting Error. Please try again later";
		header("Location: docmanageappointment.php"); die();
	}
}

?>