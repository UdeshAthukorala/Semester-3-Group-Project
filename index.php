<?php
include('config 2.php');

if (!array_key_exists("loginalertmsg",$_SESSION)) {
  $_SESSION['loginalertmsg'] = '';
}

if (!array_key_exists("user_login_status",$_SESSION)) {
  $_SESSION['user_login_status'] = '';
}

if (array_key_exists('characterid',$_SESSION)) {
    $character = (int)$_SESSION['characterid'];
    if ($character == 1 and $_SESSION['user_login_status'] == "alreadylogedin"){
        header("Location: PatientProfile.php");
    }
    else if($character == 2 and $_SESSION['user_login_status'] == "alreadylogedin"){
        header("Location: docHeader.php");
    }
    else if($character == 3  and $_SESSION['user_login_status'] == "alreadylogedin"){
        header("Location: pharmacyhome.php");
    }
    else if($character == 4  and $_SESSION['user_login_status'] == "alreadylogedin"){
        header("Location: FinanceHome.php");
    }
    else if($character == 5  and $_SESSION['user_login_status'] == "alreadylogedin"){
        header("Location: ReceptionistProfile.php");
    }
}

?>



<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Hospital</title>
<style type="text/css">
  body {
    background-image: url('assets/image/loginbg.jpg');
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100%;
    opacity: 0.9;
    filter:alpha(opacity=80);
}
</style>

</head>
<body>
  
  <div class="container">
    <div class="center card border-primary mb-3" style="max-width: 30rem; margin: auto; top : 100px;">
      <div class="card-header"><center><h2>Login</h2></center></div>
      <div class="card-body">


        <?php if ($_SESSION['loginalertmsg'] != ''): ?>     
          <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $_SESSION['loginalertmsg'] ?>
          </div>
          <?php $_SESSION['loginalertmsg'] = ''; ?>
        <?php endif; ?>

        <form action="loginfun.php" method="post">
          <fieldset>
            <div class="form-group">
              <select class="custom-select" name="character" required>
                <option value="">Who I am</option>
                <option value="1">Patient</option>
                <option value="2">Doctor</option>
                <option value="3">Pharmacists</option>
                <option value="4">Accountant</option>
                <option value="5">Receptionist</option>
                <option value="6">__+</option>
                <option value="7">Administater</option>
              </select>
            </div>

              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-user" style="font-size:27px"></i></span>
                  </div>
                  <input type="text" name="username" class="form-control"  value="<?php echo (isset($_POST['username']) ? $_POST['username'] : ''); ?>"  placeholder="Username" required >
                </div>
              </div>


              <div class="form-group">
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fa fa-key" style="font-size:20px"></i></span>
                  </div>
                  <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Amount (to the nearest dollar)" required>
                </div>
              </div>
              

              <button type="sumit" name="sumit" class="btn btn-success btn-lg" style="font-size:24px; texregchr.phpt-align:right;">Login &nbsp;&nbsp;&nbsp; <i class="fa fa-sign-in" style="font-size:24px;"></i></button>
              <hr>

          </fieldset>
        </form>
        <center><h4 class="card-title">New User? <a href="registerselectcharacter.php">Register here</a></h4></center>
      </div>
    </div>
  </div>


<script src="assets\js\jquery-3.3.1.js" ></script>
<script src="assets\js\popper.min.js" ></script>
<script src="assets\js\bootstrap.min.js"></script>



<!--   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

</body>
</html>