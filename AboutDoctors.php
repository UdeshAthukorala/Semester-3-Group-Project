<?php
include('config.php');
include('sqlphpfunctions.php');
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
    <a class="nav-link " data-toggle="tab" href=PatientReservationDetails.php>Reservation Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active"  href="#">About Doctors</a>
  </li>
  <li class="nav-item">
    <a class="nav-link "  href="SearchForDoctors.php">Search for Doctor</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="MakeReservation.php">Make a Reservation</a>
  </li>
</ul>

<!--form for make appointment !-->


<?php 
echo "<br>";
echo  '<b>'.'Username : '.'</b>' . $_SESSION['username'];
echo "<br>";
?> 

<?php  
$query = "SELECT title,firstname, lastname, dob, gender, specializationin FROM basicdetaildoctor";
$result = $mysqli->query($query);

if($result){
  $table = '<table align = center>';
  $table .= '<tr> <th>Doctor Name</th> <th>DoB</th> <th>Gender</th>  <th>Specializationin</th></tr>' ;
  while($record = mysqli_fetch_assoc($result)){
    if($record['gender']==1){
      $gender = 'Male';
    }else{
      $gender = 'Female';
    }
    $doctorName =$record['title'] . " " . ucfirst($record['firstname']) . " " .ucfirst($record['lastname']) ;

    $table .= '<tr>';
    $table .= '<td>'. $doctorName .'</td>';
    $table .= '<td>'. $record['dob'] .'</td>';
    $table .= '<td>'. $gender .'</td>';
    $table .= '<td>'. allsplidtospl($record['specializationin']) .'</td>';
    $table .= '</tr>';
  }
$table .= '<table>';
}
?>

<style type="text/css">
  table{border-collapse: collapse; margin: 10px 50px; align-content: center;align-self: center;}
  th {
    background-color: lightblue;
    color: white;
  }
  td, th {border : 1px solid black; padding: 10px;}

</style>
<?php echo $table;  ?>
</body>
</html>>