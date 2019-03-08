<?php
include('config.php');

if (isset($_POST['submitvisit'])) {
	$patusname = $_POST['patusername'];
	$docusname = $_SESSION['username'];
	$reservationid = $_POST['resverid'];
	$docnote = $_POST['doctornote'];
	$apoid = $_POST['apoid'];
	$nvcheck = isset($_POST['nvCheck']) ? $_POST['nvCheck'] : 'off' ;
	$nextvisit = (isset($_POST['inputdays']) and $nvcheck==='on')? $_POST['inputdays']*86400 : 0;
	$now1 =time();

	if ($nextvisit == 0) {
		$nextvisitts = 0;
	}else{
		$nextvisitts = $now1 + $nextvisit;
	}
	$numofrows = $_POST['numofrows'];


	$query = "INSERT INTO `visitingdata` (`patusername`, `docusername`, `ReservationID`, `doctornote`, `nextvisiting`,  `submittime`) VALUES ('$patusname', '$docusname', '$reservationid', '$docnote', '$nextvisitts', '$now1')";
	$results = $mysqli->query($query);

	if($results){
		$queryp = "SELECT `prescriptionid` FROM `visitingdata` WHERE `ReservationID` = '$reservationid'";
		$resultsp = $mysqli->query($queryp);
		if ($resultsp){
			while ($obj = $resultsp->fetch_object()) {
				$pid = $obj->prescriptionid;
				break;
			}
		}
		$timest = time();
		for ($i=1; $i <= $numofrows; $i++) {
			$med = isset($_POST['ptme'.$i]) ? $_POST['ptme'.$i] : ' ' ;;
			$qun = isset($_POST['ptqu'.$i]) ? $_POST['ptqu'.$i] : ' ' ;
			$frq = isset($_POST['ptfr'.$i]) ? $_POST['ptfr'.$i] : ' ';
			$conp = isset($_POST['ptcp'.$i]) ? $_POST['ptcp'.$i] : ' ';
			$not =  isset($_POST['ptnt'.$i]) ? $_POST['ptnt'.$i] : ' ';
			if ($med == ' ' or $med == '') {
				continue;
			}
			$querypt = "INSERT INTO `prescriptiondata` (`Prescriptionid`, `row_no`, `timestamp`, `Medicines`, `Quantity`,  `Frequency`, `Consumption_period`,`Note`) VALUES ('$pid', '$i', '$timest', '$med', '$qun', '$frq', '$conp', '$not')";
			$resultspt = $mysqli->query($querypt);
 		}
 		$com = 1;
 		$querycp ="UPDATE `patientreservationdetails` SET `completeReservation` = '1' WHERE `patientreservationdetails`.`ReservationID` = '$reservationid'";
		$resultscp = $mysqli->query($querycp);
	}

	if($results){
		$_SESSION['alertmessage'] = 'Success. Visited '.$patusname;
		header("Location: Visitingtime.php?phpapidp=".$apoid); die();
	}else{
		$_SESSION['alertmessage'] = "Error. sql Server connecting Error. Please try again later";
		header("Location: Visitingtime.php?phpapidp=".$apoid); die();
	}
}
else{
	$_SESSION['alertmessage'] = "Error. Submition Error.";
	header("Location: Visitingtime.php?phpapidp=".$apoid); die();
}

