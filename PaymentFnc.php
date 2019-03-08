<?php
include('config.php');
include('loginfirst.php');

if (!array_key_exists("reslertmsg",$_SESSION)) {
  $_SESSION['resalertmsg'] = '';
}
?>


<?php
//Check wheather All details were entered
if (isset($_POST['username']) and (isset($_POST['respayment']) and isset($_POST['phapayment'])) and isset($_POST['resId'] )) {
	$patientUsername = $_POST['username'];
	$resPayment = $_POST['respayment'];
	$phaPayment = $_POST['phapayment'];
	$resId = $_POST['resId'];
	$recUsername = $_SESSION['username'];
	$today = date("Y/m/d")
}else{
  	$_SESSION['resalertmsg'] = "Enter complete Details";
	header("Location: Payment.php"); die();
}

//Check wheather is the patient Username is correct
$query = "SELECT * FROM patientreservationdetails WHERE patientUsername='$patientUsername' AND ReservationID = '$resId'";
$result = $mysqli->query($query);
$numRows = mysqli_num_rows($result);

if($numRows<1){
	$_SESSION['resalertmsg'] = "No reservations or Invalid Data" . $numRows;
	header("Location: Payment.php"); die();
}else{
	$resultSet = mysqli_fetch_assoc($result);
	$rp = $resultSet1['resPayment'];
	$pp = $resultSet1['phaPayment'];

	if($rp!=NULL or $pp!=NULL){
	$_SESSION['resalertmsg'] = "Payment Already Done" . $numRows;
	header("Location: Payment.php"); die();
	}else{
		$query1 = "INSERT INTO `Payment` (`patientUsername`, `resPayment`,`RPDoneBy`,`RPDoneDate`,`phaPayment`,`PPDoneBy`, `PPDoneDate`) VALUES ('$patientUsername', '$resPayment','$recUsername','$today','$phaPayment','$recUsername','$today' )";
		$result1 = $mysqli->query($query1);

		$query2 = "UPDATE patientreservationdetails SET resPayment ='$resPayment', phaPayment ='$phaPayment' WHERE patientUsername='$patientUsername' AND ReservationID = '$resId'";
		$result2 = $mysqli->query($query2);

	}
}


if ($result1 === TRUE and $result2 === TRUE ) {
    $_SESSION['resalertmsg'] = "Update Successfull";
	header("Location: Payment.php"); die();
} else {
   	$_SESSION['resalertmsg'] = "Error in update Records";
	header("Location: Payment.php"); die();	
}

?>