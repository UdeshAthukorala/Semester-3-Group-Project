<?php
include('config.php');


if (!array_key_exists("searchalertmsg",$_SESSION)) {
  $_SESSION['searchalertmsg'] = ''; 
}
$currentdate = date("Y/m/d")
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Patient Profile</title>
  <style type="text/css">
  body {

    background-image: url('assets/images/p1.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-position-y: top;
    background-size: 100%;
    opacity: 0.9;
    filter:alpha(opacity=90);
  }
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
    <a class="nav-link active" data-toggle="tab" href=#>Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " data-toggle="tab" href=PatientReservationDetails.php>Reservation Details</a>
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

<!--form for make appointment !-->


<?php 
echo "<br>";
echo  '<b>'.'Username : '.'</b>' . $_SESSION['username'];
echo "<br>";
?> 

  <?php
    $patientUsername = $_SESSION['username'];
    $query = "SELECT title, firstname, lastname, email,contactno, address,dob, gender, bloodgroup, healthissue FROM basicdetailpatient WHERE username='$patientUsername'";
    $result = $mysqli->query($query);
    $resultSet = mysqli_fetch_assoc($result);
  ?>

  
  <div class="card mb-3" style="max-width: 40rem; margin: auto; top : 20px;" >
  <h3 class="card-header"><center>Patient Basic Detail</center> </h3>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Name : <?php echo $resultSet['firstname'].' '. $resultSet['lastname'] ?>  </li>
    <li class="list-group-item">Email :  <?php echo $resultSet['email'] ?> </li>
    <li class="list-group-item">Contact NO : <?php echo $resultSet['contactno']?> </li>
    <li class="list-group-item">Address : <?php echo $resultSet['address']?> </li>
    <li class="list-group-item">Date Of Birth : <?php echo $resultSet['dob']?> </li>
    <li class="list-group-item">Blood Group : <?php echo $resultSet['bloodgroup']?> </li>
  </ul>  
</div>


</head>
</html>