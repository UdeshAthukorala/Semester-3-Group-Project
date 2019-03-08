<?php
include('config 2.php');


if (!array_key_exists("regalertmsg",$_SESSION)) {
  $_SESSION['regalertmsg'] = '';
}
?>



<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/flatly/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Hospital</title>
  <style type="text/css">
  body {
    background-image: url('assets/image/regbg.jpg');
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
    <div class="center card border-primary mb-3" style="max-width: 40rem; margin: auto; top : 20px;">
      <div class="card-header"><center><h2>Register - Staff</h2></center></div>
      <div class="card-body">



        <?php if ($_SESSION['regalertmsg'] != ''): ?>     

          <div class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4 class="alert-heading">Warning!</h4>
            <p class="mb-0"> <?php echo $_SESSION['regalertmsg'] ?> </p>
          </div>

          <?php $_SESSION['regalertmsg'] = ''; ?>
        <?php endif; ?>

        <form action="registerstafffunc.php" method="post" autocomplete="on">
          <fieldset>

            <div class="form-group">
              <select class="custom-select" name="character" value= "3" required>
                <option value="">Select a character</option>
                <option value="3">Pharmacists</option>
                <option value="4">Accountant</option>
                <option value="5">Receptionist</option>
                <option value="6">__+</option>
                <option value="7">Administater</option>
              </select>
            </div>

            <div class="form-group">
              <label class="col-form-label" for="inputDefRegisterault">Name</label>
              <div class="row" style="margin-left: 0;">
                <select name="title" class="custom-select" required style="width: 75px; margin: 5px; ">
                  <option value="Mr. "> Mr.</option>
                  <option value="Mrs. "> Mrs.</option>
                  <option value="Miss "> Miss</option>
                  <option value="Ms. "> Ms.</option>
                  <option value="Dr. "> Dr.</option>
                  <option value="Prof. "> Prof.</option>
                  <option value="Rev. "> Rev.</option>
                </select>
                <input type="text" class="form-control" name="fname" placeholder="First Name" style="max-width: 250px; margin: 5px;"  pattern="[A-Za-z]{1,40}" title="Text Only or too long" required>
                <input type="text" class="form-control" name="lname" placeholder="Last Name" style="max-width: 250px; margin: 5px;" pattern="[A-Za-z]{1,40}" title="Text Only or too long" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-form-label" for="inputDefault">User Name</label>
              <input type="text" class="form-control" name="username" placeholder="User Name"  pattern="[A-Za-z0-9_]{1,40}" title="You can use (a-z) / (A-Z) / (0-9) / _ and less than 40 character" required>
            </div>

            <div class="form-group">
              <label class="col-form-label" for="inputDefault">Password <tagname style="font-size: 11px;"><br />(At least six characters. One or more of each of the following: Lower-case letter, Upper-case, letter Number) </tagname></label>
              <input type="Password" class="form-control" name="password1" placeholder="Password" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,25}" title="Must contain at least one number and one uppercase and lowercase letter, and 6 to 25 characters" required>
            </div>

            <div class="form-group">
              <label class="col-form-label" for="inputDefault">Re-type Password</label>
              <input type="Password" class="form-control" name="password2" placeholder="Re-type" id="confirm_password" required>
            </div>

            <div class="form-group">
              <label class="col-form-label" for="inputDefault">E-mail</label>
              <input type="email" class="form-control" name="email" placeholder="E-mail"  required pattern="{1,50}">
            </div>
            <div class="form-group">
              <label class="col-form-label" for="inputDefault">Contact No</label>
              <input type="text" class="form-control" name="Contactno" placeholder="Contact No" pattern="[0-9]{8,25}"  required>
            </div>
            <div class="form-group">
              <label class="col-form-label" for="inputDefault">Address</label>
              <input type="text" class="form-control" name="address" placeholder="Address"  required>
            </div>

            <div class="form-group">
              <label class="col-form-label" for="inputDefault">Date of Birth</label>
              <input type="date" class="form-control" name="dob"  required>
            </div>

            <div class="form-group">
              <label class="col-form-label" for="inputDefault">Gender</label>
              <div class="row" style="margin-left: 0;">

                <div class="custom-control custom-radio" style="margin-right: 25px;">
                  <input type="radio" id="customRadio1" name="gender" value="1" class="custom-control-input" required>
                  <label class="custom-control-label" for="customRadio1">Male</label>
                </div>

                <div class="custom-control custom-radio" style="margin-right: 25px;">
                  <input type="radio" id="customRadio2" name="gender" value="2" class="custom-control-input" required>
                  <label class="custom-control-label" for="customRadio2">Female</label>
                </div>

                <div class="custom-control custom-radio" style="margin-right: 25px;">
                  <input type="radio" id="customRadio3" name="gender" value="3" class="custom-control-input" disabled="">
                  <label class="custom-control-label" for="customRadio3">Other</label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                <label class="custom-control-label" for="customCheck1">I've read and accept the <a href="">terms & conditions</a></label>
              </div>
            </div>

            <button type="sumit" name="sumit" class="btn btn-success btn-lg" style="font-size:24px; texregchr.phpt-align:right;">Register &nbsp;&nbsp; <i class="fa fa-handshake-o" style="font-size:24px;"></i></button>
            <hr>

          </fieldset>
        </form>
        <center><h4 class="card-title">Already have Account? <a href="index.php">Login</a></h4></center>
      </div>
    </div>
  </div>


  <script type="text/javascript">
    var password = document.getElementById("password")
    , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

  </script>
  <script src="assets\js\jquery-3.3.1.js" ></script>
<script src="assets\js\popper.min.js" ></script>
<script src="assets\js\bootstrap.min.js"></script>
 <!--  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</body>
</html>