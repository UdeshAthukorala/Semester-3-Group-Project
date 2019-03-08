<?php
include('config.php');
include('loginfirst.php');

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
  <title>Search for Doctors</title>
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
    <a class="nav-link"  href="PatientProfile.php">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link "  href=PatientReservationDetails.php>Reservation Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  href="AboutDoctors.php">About Doctors</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="SearchFordoctors.php">Search for Doctor</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href=#>Make a Reservation</a>
  </li>
</ul>

<?php 
echo "<br>";
echo  '<b>'.'Username : '.'</b>' . $_SESSION['username'];
echo "<br>";
?> 

<!--form for make appointment !-->

  <div class="container">
    <div class="center card border-primary mb-3" style="max-width: 40rem; margin: auto; top : 20px;">
      <div class="card-header"><center><h2>Select a Doctor For Reservation</h2></center></div>
      <div class="card-body">



        <?php if ($_SESSION['searchalertmsg'] != ''): ?>     

          <div class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4 class="alert-heading">Warning!</h4>
            <p class="mb-0"> <?php echo $_SESSION['searchalertmsg'] ?> </p>
          </div>

          <?php $_SESSION['searchalertmsg'] = ''; ?>
        <?php endif; ?>

        <form action="MakeReservation1.php" method="post" autocomplete="on">
          <fieldset>


             <div class="form-group">
                <label for="SelectDoctor">Select Doctor</label>
                <select class="form-control"  name="docUsername"  id="Select Doctor" required>
                  <option value="">Select Doctor</option>
                  <?php
                  $query = "SELECT * FROM basicdetaildoctor";
                    $results = $mysqli->query($query);
                    if ($results){
                      while ($obj = $results->fetch_object()) {
                        $doctorNames =$obj->title . " " . ucfirst($obj->firstname) . " " .ucfirst($obj->lastname) ;
                        $docusername = $obj->username; ?>

                        <option value="<?php echo $docusername; ?>"><?php echo $doctorNames; ?></option>
                        <?php
                      }
                    }
                ?>
               </select>
              </div>
 

            <button type="submit" name="submit" class="btn btn-success btn-lg" style="font-size:24px; texregchr.phpt-align:right;">Search &nbsp;&nbsp; <i class="fa fa-handshake-o" style="font-size:24px;"></i></button>

            
          
  </div>

  <script src='assets/js/vue.js'></script>
  <script src='assets/js/vue-select.js'></script>

</body>
</html>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>