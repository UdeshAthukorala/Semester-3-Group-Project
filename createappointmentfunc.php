<?php
include 'sqlphpfunctions.php';
if (isset($_POST['aptimestart']) and isset($_POST['specialization'])) {
	$username = $_SESSION['username'];
	$aptimestart = strtotime($_POST['aptimestart']);
	$timetaking = $_POST['timetaking'];
	$aptimeend = $aptimestart+$timetaking*60;
	$maxpatient = $_POST['maxpatient'];
	$spls = $_POST['specialization'];
	$docsplids = allspltosplid($spls);
	$currenttime = time();

	$query = "INSERT INTO `docappointment` (`username`, `appointmentfrom`, `appointmentto`, `maxnoofpatient`, `appointmentspecialization`, `createdon`) VALUES ('$username', '$aptimestart', '$aptimeend', '$maxpatient', '$docsplids', '$currenttime')";
	$results = $mysqli->query($query);
	if($results){
		$_SESSION['alertmessage'] = 'Success. New Appointment is Created. Appointment on '.date("F j, Y, g:i a",$aptimestart);
		header("Location: docmanageappointment.php"); die();
	}else{
		$_SESSION['alertmessage'] = "Error. sql Server connecting Error. Please try again later";
		header("Location: docmanageappointment.php"); die();
	}
}
else{
	$_SESSION['alertmessage'] = "Error. Submition Error.";
	header("Location: docmanageappointment.php"); die();
}
?>

