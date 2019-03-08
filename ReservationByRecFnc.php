<?php
include('config.php');
include('loginfirst.php');
include ('sqlphpfunctions.php');

if (!array_key_exists("loginalertmsg",$_SESSION)) {
  $_SESSION['loginalertmsg'] = '';
}
?>


<?php
//Check wheather All details were entered
if (isset($_POST['docUsername']) ) {
  $docUsername = $_POST['docUsername'];
}else{
    $_SESSION['reslertmsg'] = "Enter complete Details";
  header("Location: MakeReservation.php"); die();
}
?>

<?php
$username = $docUsername;

$query = "SELECT specializationin FROM basicdetaildoctor WHERE username='$username';";
$results = $mysqli->query($query);
if ($results){
  while ($obj = $results->fetch_object()) {
    $splidstr = $obj->specializationin;
    break;
  }
  $splstr = allsplidtospl($splidstr);
  $dsplarray = explode(',', $splstr);
}

$query1 = "SELECT * FROM basicdetaildoctor WHERE username='$docUsername'";
$result1 = $mysqli->query($query1);

  $resultSet1 = mysqli_fetch_assoc($result1);
  $docName =$resultSet1['title'] . " " . ucfirst($resultSet1['firstname']) . " " .ucfirst($resultSet1['lastname']);

?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
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

<!--Patient navigation bar !-->
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
    <a class="nav-link active" href=#>Make a Reservation</a>
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

<!--form for make appointment !-->


<div align="center" >
    <div class="container" style="max-width: 40rem; margin: 0">
      <hr>
      <?php
        $now = time();
        $query = "SELECT * FROM `docappointment` WHERE `username` = '$docUsername' and `appointmentto` > '$now' ORDER BY appointmentfrom ASC";
        $results = $mysqli->query($query);
        if ($results and mysqli_num_rows($results)>0){
        ?>


          <div class="jumbotron" align="center">
            <p class="lead">
              <a class="btn btn-primary btn-lg" href="SearchForDoctorsRec.php" role="button">Search For Another DOCTOR</a>
            </p>
             <hr class="my-4">
            <p class="lead">Available Dates of <?php echo $docName ?> </p> 
          </div>


        <?php

          $count = 0;
            while ($obj = $results->fetch_object()) {
              $apid = $obj->appointmentid;
              $apfrom = $obj->appointmentfrom;
              $apto = $obj->appointmentto;
              $maxpet = $obj->maxnoofpatient;
              $regpet = $obj->noofregisteredpatients;
              $apsplid = $obj->appointmentspecialization;
              $createdon = $obj->createdon;
              $percentage = $regpet*100 / $maxpet;
              $creat = date("F j, Y - g:i A", $createdon);
              $date = date("F j, Y", $apfrom);
              $stime = date("g:i A", $apfrom);
              $etime = date("g:i A", $apto);
              $week = date("l", $apfrom);
              $apspl = str_replace(',',',&nbsp&nbsp',allsplidtospl($apsplid));   ?>

          
            <div class="card">
              <div class="card-body">
                <h3 class="card-title"><?php echo $date; ?><tagname style="font-size: 16px;"><?php echo ' &nbsp&nbsp('.$week.' )'; ?></tagname></h3>
                <h5 class="card-subtitle mb-2 text-muted"><?php echo $stime.' - '.$etime; ?></h5>
                <h5 class="card-text"><?php echo 'Appointment Id : '.$apid; ?></h5><p></p>
                <h5>Specialization in :</h5>
                <p class="card-text"><?php echo $apspl; ?></p>
                <h5 class="card-text"><?php echo 'Registered Patients : '.$regpet.' / '.$maxpet; ?></h5>
                <div class="progress">
                  <div class="progress-bar progress-bar-striped bg-info progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="<?php echo 'width: '.$percentage.'%'; ?>"></div>
                </div>
                <p></p>
                <a  class="card-link" style="top: 40px;"><?php echo 'Created on '.$creat; ?></a>
                
                <form action="ReservationByRecFnc1.php" method="post" ><fieldset>
                  <input name="entryid" value="<?php echo $apid ?>" hidden >
                  <?php if ($regpet<$maxpet) { ?>
                    <br>

                    <div class="form-group">
                      <label class="col-form-label" for="inputDefault">Enter Patient User Name</label>
                      <input type="text" class="form-control" name="patientUsername" placeholder="Patient User Name"  pattern="[A-Za-z0-9_]{1,40}" title="You can use (a-z) / (A-Z) / (0-9) / _ and less than 40 character" required>
                    </div>

                   <br>
                   <button type="submit" name="submit" class="btn btn-info" >Reserve &nbsp;&nbsp; </button>
                  <?php } ?>
                </fieldset></form>

              </div>
            </div>
            <hr>
              <?php $count++; }  
            }else{
              ?>
              <div class="jumbotron" align="center">
              <p class="lead">
              <p class="lead"><?php echo $docName ?> is Not Available For Future Dates Yet </p>
              <hr class="my-4">
              <a class="btn btn-primary btn-lg" href="MakeReservation.php" role="button">Search For Another DOCTOR</a>
               </p>
              </div>

            <?php } ?>


</body>
</html>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>