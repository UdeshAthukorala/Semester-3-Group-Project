<?php
include('config.php');

if (!array_key_exists("reslertmsg",$_SESSION)) {
  $_SESSION['resalertmsg'] = '';
}
?>


<?php
//Check wheather All details were entered
if (isset($_POST['entryid']) and isset($_POST['patientUsername']) ) {
  $appId = $_POST['entryid']; 
  $username = $_POST['patientUsername'];
}else{
    $_SESSION['resalertmsg'] = "Enter complete Details";
  header("Location: ReservationByRec.php"); die();
}

//Check wheather is a date is correct?
/*$today_start = strtotime('today');

$date_timestamp = strtotime($reservationDate);

if ($date_timestamp < $today_start) {
   $_SESSION['resalertmsg'] = "Enter a correct Date";
   header("Location: MakeReservation.php"); die();
} */

$query = "SELECT * FROM loginuser WHERE username='$username' ";
  $results = $mysqli->query($query);
  $num_rows = mysqli_num_rows($results);
  if (!($num_rows==1 and $results)){
    $_SESSION['resalertmsg'] = "Login";
    header("Location: ReservationByRec.php"); die();

  }



//Check wheather is the Doctors is available on the given date
$query1 = "SELECT * FROM docappointment WHERE appointmentid = '$appId'";
$result1 = $mysqli->query($query1);
$numRows1 = mysqli_num_rows($result1);

if($numRows1>=1){
  $resultSet1 = mysqli_fetch_assoc($result1);
  $maxNo = $resultSet1['maxnoofpatient'];
  $regNo = $resultSet1['noofregisteredpatients'];
  $docUsername = $resultSet1['username'];
  $appointmentFrom = $resultSet1['appointmentfrom'];
  $appointmentTo= $resultSet1['appointmentto'];
  
  if ($maxNo>$regNo) {
    $chanelNo = $regNo + 1;

    $query2 = "UPDATE docappointment SET noofregisteredpatients ='$chanelNo' WHERE appointmentid = '$appId'";
    $result2 = $mysqli->query($query2);

    $query0 = "SELECT * FROM basicdetaildoctor WHERE username='$docUsername'";
    $result0 = $mysqli->query($query0);

    $resultSet0 = mysqli_fetch_assoc($result0);
    $docName =$resultSet0['title'] . " " . ucfirst($resultSet0['firstname']) . " " .ucfirst($resultSet0['lastname']);


    
    $query3 = "INSERT INTO `patientreservationdetails` (`patientUsername`, `doctorUsername`, `doctorName`, `chanelNo`, `appointmentId`,`appointmentFrom`,`appointmentTo`) VALUES ('$username', '$docUsername','$docName', '$chanelNo','$appId','$appointmentFrom','$appointmentTo')";
    $result3 = $mysqli->query($query3);

    if ($result2 === TRUE and $result3 === TRUE) {
        $_SESSION['chanelNo']= $chanelNo;
      $_SESSION['chanelDate']= date("F j, Y", $appointmentFrom);
      $_SESSION['chanelDoctor']= $docName;
    
      header("Location: CompleteReservationRec.php");
    } else {
        $_SESSION['resalertmsg'] = "Error in update Records". $mysqli->error;
      header("Location: MakeReservation.php"); die(); 
    }
    

  }elseif($maxNo!=NULL){
    $_SESSION['resalertmsg'] = "Doctor's Channel List is Full";
    header("Location: MakeReservation.php"); die(); 
  }
  else{
    $_SESSION['resalertmsg'] = "Doctor is Not Available.";
    header("Location: MakeReservation.php"); die();
  }
}else{
    $_SESSION['resalertmsg'] = "Doctor is Not Available.";
    header("Location: MakeReservation.php"); die();
}

?>