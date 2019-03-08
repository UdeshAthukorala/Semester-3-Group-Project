<?php
include('config.php');
include('loginfirst.php');


if (!array_key_exists("loginalertmsg",$_SESSION)) {
  $_SESSION['loginalertmsg'] = '';
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
        <a class="nav-link" href="#">Home</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="#">Log Out</a>
      </li>
    </ul>
  </div>
</nav>


<!--Receptionist navigation bar !-->

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link "  href="ReceptionistProfile.php">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link "  href="AboutDoctorsRec.php">About Doctors</a>
  </li>
  <li class="nav-item">
    <a class="nav-link "  href="SearchForDoctorsRec.php">Search for Doctor</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="ReservationByRec.php">Make a Reservation</a>
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
echo  '<b>'.'Username : '.'</b>' . $_SESSION['username'];
echo "<br>";
?> 

<script type="text/javascript">
    var chanelNo = <?php echo json_encode($_SESSION['chanelNo']); ?>;
    var chanelDate = <?php echo json_encode($_SESSION['chanelDate']); ?>;
    var chanelDoctor = <?php echo json_encode($_SESSION['chanelDoctor']); ?>;
  

</script>

<div class="container" style="padding-top: 100px;">
<div class="jumbotron">
  <h1 class="display-3">Reservation Successful</h1>
  <h2 class="lead">Your Channel No : <script type="text/javascript"> document.write(chanelNo) </script>   </h2>
  <h2 class="lead">Your Channel Date : <script type="text/javascript"> document.write(chanelDate) </script>   </h2>
  <h2 class="lead">Your Channel Doctor : <script type="text/javascript"> document.write(chanelDoctor) </script>   </h2>
 
  <hr class="my-4">
  <h4>Please contact us for more information</h4>
  <hr>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="logout.php" role="button">Logout</a>
  </p>
</div>
</div>
</body>
</html>
