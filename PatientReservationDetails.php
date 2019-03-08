<?php
include('config.php');


if (!array_key_exists("searchalertmsg",$_SESSION)) {
  $_SESSION['searchalertmsg'] = ''; 
}
$currentdate = date("Y/m/d")
?>

<?php
    $patientUsername = $_SESSION['username'];
    $query = "SELECT title, firstname, lastname, email,contactno, address,dob, gender, bloodgroup, healthissue FROM basicdetailpatient WHERE username='$patientUsername'";
    $result = $mysqli->query($query);
    $resultSet = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Patient Profile</title>
  <style type="text/css">

  </style>
</head>

<body>

<!--main navigation bar !-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="Home.php">Home</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="logout.php">Log Out</a>
      </li>
    </ul>
  </div>
</nav>


<!--Patient navigation bar !-->

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" data-toggle="tab" href="PatientProfile.php">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href=#>Reservation Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " data-toggle="tab" href="AboutDoctors.php">About Doctors</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " data-toggle="tab" href="SearchForDoctors.php">Search for Doctor</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="MakeReservation.php">Make a Reservation</a>
  </li>
</ul> 

<?php 
echo "<br>";
echo  '<b>'.'Username : '.'</b>' . $_SESSION['username'];
echo "<br>";
?> 

<?php  echo "<br>";?>

<?php  
    $query1 = "SELECT * FROM patientreservationdetails  WHERE patientUsername = '$patientUsername'";
      $result1 = $mysqli->query($query1);

      if($result1 and mysqli_num_rows($result1)>0){
      $table = '<table align = center>';
      $table .= '<tr> <th>Res. ID</th> <th>Doctor Name</th> <th>Date</th> <th>Time</th> <th>Channel NO</th>  <th>Complete Reservation</th> <th>Res Payment(Rs/=)</th> <th>Pha Payment(Rs/=)</th> <th>Other Details</th> </tr>' ;
      while($record = mysqli_fetch_assoc($result1)){
        $stime = date("g:i A", $record['appointmentFrom']);
        $etime = date("g:i A", $record['appointmentTo']);
        if ($record['completeReservation']==0) {
          $complete = "No";
        }else{
          $complete = "Yes";
        }

        $table .= '<tr>';
        $table .= '<td>'. $record['ReservationID'] .'</td>';
        $table .= '<td>'. $record['doctorName'] .'</td>';
        $table .= '<td>'.  date("F j, Y ", $record['appointmentFrom']) .'</td>';
        $table .= '<td>'. $stime.' - '.$etime .'</td>';
        $table .= '<td>'. $record['chanelNo'] .'</td>';
        $table .= '<td>'. $complete .'</td>';
        $table .= '<td>'. $record['resPayment'] .'</td>';
        $table .= '<td>'. $record['phaPayment'] .'</td>';
        if ($complete == "Yes") {
          $table .= '<td>'. '<a class="btn btn-outline-secondary" href="PatientOtherDetails.php?resid='.$record['ReservationID'].'">Other Details</a>' .'</td>';
        }else{
           $table .= '<td>'. 'Not Complete Yet' .'</td>';
        }
        
        $table .= '</tr>';
      }
    $table .= '<table>';
    
    ?>
    <style type="text/css">
      table{border-collapse: collapse; align-content: center;align-self: center;}
      th {
        background-color: lightblue;
        color: white;
      }
      td, th {border : 1px solid black; padding: 10px;}

    </style>


     <?php echo $table; 

    }else{ ?>
      <div class="jumbotron" align="center">
          <h1 class="display-3">Yoy Have NO Reservations yet</h1>
          
      </div>

<?php
  }
 ?>


</body>
</html>