<?php
include('config.php');
include('loginfirst.php');

if (!array_key_exists("loginalertmsg",$_SESSION)) {
  $_SESSION['loginalertmsg'] = '';
}
?>


<?php
//Check wheather All details were entered
if (isset($_POST['docUsername']) and isset($_POST['reservationDate'] )) {
	$docUserName = $_POST['docUsername'];
	$reservationDate = $_POST['reservationDate'];
	$username = $_SESSION['username'];
}else{
  	$_SESSION['searchalertmsg'] = "Enter complete Details";
	header("Location: SearchForDoctors.php"); die();
}


//Check wheather is a date is correct?
$today_start = strtotime('today');

$date_timestamp = strtotime($reservationDate);
$mints = $date_timestamp - $date_timestamp%86400 + 86400;

$maxts = $mints + 86400;
echo $date_timestamp." ".$mints." ".$maxts;

if ($date_timestamp < $today_start) {
   $_SESSION['searchalertmsg'] = "Enter a correct Date";
   header("Location: SearchForDoctors.php"); die();
}


//Check wheather is the Doctors is available on the given date
$query1 = "SELECT * FROM docappointment WHERE username='$docUserName' AND  '$mints' < appointmentfrom AND '$maxts' > appointmentfrom";
// AND '$mints' < appointmentfrom AND '$maxts' > appointmentfrom
$result1 = $mysqli->query($query1);
$numRows1 = mysqli_num_rows($result1);
if($result1 and mysqli_num_rows($result1)>0  ){
	/*$resultSet1 = mysqli_fetch_assoc($result1);
	$maxNo = $resultSet1['maxnoofpatient'];
	$regNo = $resultSet1['noofregisteredpatients'];
	if ($maxNo>$regNo) {
		$_SESSION['searchalertmsg'] = "Doctor is Available. You can make a Reservation";
		header("Location: SearchForDoctors.php"); die();
	}elseif($maxNo!=NULL){
		$_SESSION['searchalertmsg'] = "Doctor's Channel List is Full";
		header("Location: SearchForDoctors.php"); die();	
	}
	else{
		$_SESSION['searchalertmsg'] = "Doctor is Not Available.";
		header("Location: SearchForDoctors.php"); die();
	} */
	$_SESSION['searchalertmsg'] = "Doctor is Available.";
	header("Location: SearchForDoctors.php"); die();
}else{
	$_SESSION['searchalertmsg'] = "Doctor is Not Available.";
	header("Location: SearchForDoctors.php"); die();
}

?>

