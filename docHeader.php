<?php include 'loginfirst.php'; 
      include 'config.php'; ?>
<?php
$_SESSION['firstname'] = "Doctorname";
if (!array_key_exists("alertmessage",$_SESSION)) {
  $_SESSION['alertmessage'] = '';
}
if (!array_key_exists("tabtoggle",$_SESSION)) {
  $_SESSION['tabtoggle'] = '';
}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


	<title>Hospital</title>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto my-2 my-lg-0" style="right:0;">
      <li class="nav-item">
        <tagname class="nav-link"><?php echo "Hai, Dr. ".$_SESSION['firstname'].". Welcome to Hospital Management System" ?> </tagname>
      </li>
    </ul>
     <li class="nav-item">
        <a href="logout.php" class="btn btn-secondary my-2 my-sm-0"  style="border-radius: 8px; margin: 30px;">Logout</a>
    </li>

    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
   
  </div>
</nav>
<hr>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action active">Patients</a>
          <a href="docmanageappointment.php" class="list-group-item list-group-item-action">Manage Appointment</a>
          <a href="Visitingtime.php" class="list-group-item list-group-item-action">Visiting Time</a>
        </div>
        <hr>
        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action active">Profile</a>
          <a href="#" class="list-group-item list-group-item-action">Settings</a>
          <a href="#" class="list-group-item list-group-item-action">Notifications</a>
          <a href="#" class="list-group-item list-group-item-action">Massages</a>
        </div>  

      </div>
      <div class="col-md-9">
