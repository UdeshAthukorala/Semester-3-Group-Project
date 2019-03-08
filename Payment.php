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
  <title>Payment - Receptionist</title>
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
    <a class="nav-link"  href="ReceptionistProfile.php">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  href="AboutDoctorsRec.php">About Doctors</a>
  </li>
  <li class="nav-item">
    <a class="nav-link "  href="SearchForDoctorsRec.php">Search for Doctor</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="ReservationByRec.php">Make a Reservation</a>
  </li>
  <li class="nav-item">
    <a class="nav-link "  href="RegistrationRec.php">Registration</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="Payment.php">Payment</a>
  </li>
</ul>


<?php 
echo "<br>";
echo  '<b>'.'   Username : '.'</b>' . $_SESSION['username'];
echo "<br>";
?> 

<!--form for make appointment !-->

  <div class="container">
    <div class="center card border-primary mb-3" style="max-width: 40rem; margin: auto; top : 20px;">
      <div class="card-header"><center><h2>Take Payments</h2></center></div>
      <div class="card-body">



        <?php if ($_SESSION['resalertmsg'] != ''): ?>     

          <div class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4 class="alert-heading">Warning!</h4>
            <p class="mb-0"> <?php echo $_SESSION['resalertmsg'] ?> </p>
          </div>

          <?php $_SESSION['resalertmsg'] = ''; ?>
        <?php endif; ?>

        <form action="PaymentFnc.php" method="post" autocomplete="on">
          <fieldset>

            <input hidden="" type="text" class="form-control" name="character" value="1" required>

            <div class="form-group">
              <label class="col-form-label" for="inputDefault">Patient User Name</label>
              <input type="text" class="form-control" name="username" placeholder="User Name"  pattern="[A-Za-z0-9_]{1,40}" title="You can use (a-z) / (A-Z) / (0-9) / _ and less than 40 character" required>
            </div>


            <div class="form-group">
              <label class="col-form-label" for="inputDefault">Reservation ID</label>
              <input type="text" class="form-control" name="resId" placeholder="Reservation ID"  pattern="[0-9]{1,40}" title="You can use (0-9) and less than 40 character" required>
            </div>

            <div class="form-group">
              <label class="col-form-label" for="inputDefault">Payment For Reservation</label>
              <input type="text" class="form-control" name="respayment" placeholder="Payment For Reservation"  pattern="[0-9]{1,40}" title="You can use (0-9) and less than 40 character" required>
            </div>

            <div class="form-group">
              <label class="col-form-label" for="inputDefault">Payment For Pharmacy</label>
              <input type="text" class="form-control" name="phapayment" placeholder="Payment For Pharmacy"  pattern="[0-9]{1,40}" title="You can use (0-9) and less than 40 character" required>
            </div>

            

            <button type="submit" name="submit" class="btn btn-success btn-lg" style="font-size:24px; texregchr.phpt-align:right;">Add Payment &nbsp;&nbsp; <i class="fa fa-handshake-o" style="font-size:24px;"></i></button>
            
  </div>

</body>
</html>