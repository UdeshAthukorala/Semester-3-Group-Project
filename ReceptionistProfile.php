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
  <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Search for Doctors</title>
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


<!--Receptionist  navigation bar !-->

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href=#>Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " data-toggle="tab" href="AboutDoctorsRec.php">About Doctors</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " data-toggle="tab" href="SearchForDoctorsRec.php">Search for Doctor</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="ReservationByRec.php">Make a Reservation</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " data-toggle="tab" href="RegistrationRec.php">Registration</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="Payment.php">Payment</a>
  </li>
  

</ul>

<!--Receptionist Detail !-->

<?php 
echo "<br>";
echo  '<b>'.'   Username : '.'</b>' . $_SESSION['username'];
echo "<br>";
?> 

  <?php
    $recUsername = $_SESSION['username'];
    $query = "SELECT title, firstname, lastname, email,contactno, address,dob, gender FROM basicdetailstaff WHERE username='$recUsername'";
    $result = $mysqli->query($query);
    if($result){
      $resultSet = mysqli_fetch_assoc($result);
    }else{
      echo "string";
    }
  ?>

  
  <div class="card mb-3" style="max-width: 40rem; margin: auto; top : 20px;" >
  <h3 class="card-header"><center>Receptionistist Basic Detail</center> </h3>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Name : <?php echo $resultSet['firstname'].' '. $resultSet['lastname'] ?>  </li>
    <li class="list-group-item">Email :  <?php echo $resultSet['email'] ?> </li>
    <li class="list-group-item">Contact NO : <?php echo $resultSet['contactno']?> </li>
    <li class="list-group-item">Address : <?php echo $resultSet['address']?> </li>
  </ul>
  
</div>

<?php  echo "<br>";  echo" <br>";?>

</head>
</html>