<?php
include('config.php');
include('loginfirst.php');

if (!array_key_exists("regalertmsg",$_SESSION)) {
  $_SESSION['regalertmsg'] = '';
}
?>

<?php
$specialization = array();
$query = "SELECT * FROM specialization";
$results = $mysqli->query($query);
if ($results){
  while ($obj = $results->fetch_object()) {
    $specialization[] = $obj->anyspecialization;
  }
}
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Register Doctor</title>
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
    <a class="nav-link active"  href="#">Registration</a>
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

<!-- Form for Register Doctor !-->

  <div class="container">
    <div class="center card border-primary mb-3" style="max-width: 40rem; margin: auto; top : 20px;">
      <div class="card-header"><center><h2>Register - Doctor</h2></center></div>
      <div class="card-body">



        <?php if ($_SESSION['regalertmsg'] != ''): ?>     

          <div class="alert alert-dismissible alert-warning">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4 class="alert-heading">Warning!</h4>
            <p class="mb-0"> <?php echo $_SESSION['regalertmsg'] ?> </p>
          </div>

          <?php $_SESSION['regalertmsg'] = ''; ?>
        <?php endif; ?>

        <form action="RegisterDocRecFnc.php" method="post">
          <fieldset>


            <input hidden="" type="text" class="form-control" name="character" value="2" required>

            <div class="form-group">
              <label class="col-form-label" for="inputDefRegisterault">Name</label>
              <div class="row" style="margin-left: 0;">
                <select name="title" class="custom-select" required style="width: 75px; margin: 5px; ">
                  <option value="Mr. "> Mr.</option>
                  <option value="Mrs. "> Mrs.</option>
                  <option value="Miss "> Miss</option>
                  <option value="Ms. "> Ms.</option>
                  <option value="Dr. " selected=""> Dr.</option>
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
              <label class="col-form-label" for="inputDefault">Password</label>
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
              <label class="col-form-label" for="inputDefault">Specialization in</label>
              <div id="app" >
                <v-select multiple v-model="selected" :options="options"></v-select>
                <input hidden="" type="text" class="form-control" name="specialization" :value="selected" >
              </div>
            </div>

            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                <label class="custom-control-label" for="customCheck1">I've read and accept the <a href="">terms & conditions</a></label>
              </div>
            </div>

            <button type="sumit" name="sumit" class="btn btn-success btn-lg" style="font-size:24px; margin: 20px; texregchr.phpt-align:right;">Register &nbsp;&nbsp; <i class="fa fa-handshake-o" style="font-size:24px;"></i></button>
            <hr>

          </fieldset>
        </form>
        <center><h4 class="card-title">Already have Account? <a href="index.php">Login</a></h4></center>
      </div>
    </div>
  </div>


  <!-- gggggggggggggggggggggggggggg -->
  <script src='https://unpkg.com/vue@latest'></script>
  <script src='https://unpkg.com/vue-select@latest'></script>
  <script type="text/javascript">
    Vue.component('v-select', VueSelect.VueSelect)
    var obj = <?php echo json_encode($specialization); ?>;
    new Vue({
      el: '#app',
      data: {
        selected: [],
        options: obj
      }
    })

  </script>
  <!-- gggggggggggggggggggggggggggg -->








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

</body>
</html>