<?php
include('config.php');
include('loginfirst.php');

if (!array_key_exists("resalertmsg",$_SESSION)) {
  $_SESSION['resalertmsg'] = ''; 
}
$currentdate = date("Y/m/d")
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Registration</title>
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
    <a class="nav-link"  href="ReceptionistProfile.php">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  href="AboutDoctors.Rec">About Doctors</a>
  </li>
  <li class="nav-item">
    <a class="nav-link "  href="SearchForDoctorsRec.php">Search for Doctor</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="ReservationByRec.php">Make a Reservation</a>
  </li>
   <li class="nav-item">
    <a class="nav-link active" href="RegistrationRec.php">Registration</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Payment.php">Payment</a> 
  </li>
</ul>

<?php 
echo "<br>";
echo  '<b>'.'   Username : '.'</b>' . $_SESSION['username'];
echo "<br>";
?> 
  
  <div class="container">
    <div class="center card border-primary mb-3" style="max-width: 30rem; margin: auto; top : 100px;">
      <div class="card-header"><center><h2>Register For</h2></center></div>
      <div class="card-body">
        <center>
        <p class="lead">
    <a class="btn btn-primary btn-lg" href="RegisterPatientRec.php" role="button">Patient</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="RegisterDocRec.php" role="button">Doctor</a>
  </p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="RegisterStaffRec.php" role="button">Other Staff</a>
  </p>

</body>
</html>