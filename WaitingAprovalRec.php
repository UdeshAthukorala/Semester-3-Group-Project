<?php
include('config.php');
include('loginfirst.php');

if (!array_key_exists("regalertmsg",$_SESSION)) {
  $_SESSION['regalertmsg'] = '';
}
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Hospital</title>
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
    <a class="nav-link"  href="AboutDoctorsRec.php">About Doctors</a>
  </li>
  <li class="nav-item">
    <a class="nav-link "  href="SearchForDoctorsRec.php">Search for Doctor</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="ReservationByRec.php">Make a Reservation</a>
  </li>
  <li class="nav-item">
    <a class="nav-link "  href="RegistrationRec.php">Registration</a>
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

<div class="container" style="padding-top: 100px;">
<div class="jumbotron">
  <h1 class="display-3">Registration Successful</h1>
  <h2 class="lead">Registration waiting for approval.</h2>
  <hr class="my-4">
  <h4>Please contact Administrator for more information</h4>
  <hr>
</div>
</div>
</body>
</html>
