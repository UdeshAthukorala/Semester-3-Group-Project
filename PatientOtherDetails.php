<?php
include('config.php');


if (!array_key_exists("searchalertmsg",$_SESSION)) {
  $_SESSION['searchalertmsg'] = ''; 
}
$currentdate = date("Y/m/d");
$resId = $_GET['resid'];
?>


<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Patient Profile</title>
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
    <a class="nav-link" data-toggle="tab" href="PatientProfile.php">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" data-toggle="tab" href="PatientReservationDetails.php">Reservation Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " data-toggle="tab" href="AboutDoctors.php">About Doctors</a>
  </li>
  <li class="nav-item">
    <a class="nav-link " data-toggle="tab" href="SearchForDoctors.php">Search for Doctor</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="MakeReservation.php">Make a Reservation</a>
  </li>
</ul> 

<?php 
echo "<br>";
echo  '<b>'.'Username : '.'</b>' . $_SESSION['username'];
echo "<br>";
?> 

<?php  echo "<br>";?>

<?php  
    $query = "SELECT * FROM visitingdata  WHERE ReservationID = '$resId'";
      $result = $mysqli->query($query);
      $resultSet = mysqli_fetch_assoc($result);
      $presId = $resultSet['prescriptionid'];

      ?>

      <div class="card mb-3" style="max-width: 40rem; margin: auto; top : 20px;" >
      <h3 class="card-header"><center>Patient Visiting Details</center> </h3>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Doctor Note : <?php echo $resultSet['doctornote'] ?>  </li>
        <li class="list-group-item">Next Visiting :  <?php echo date("Y-m-d",$resultSet['nextvisiting'])  ?> </li>
        <li class="list-group-item">Prescription ID : <?php echo $resultSet['prescriptionid']?> </li>
      </ul>  
      </div>

      <?php
      $query1 = "SELECT * FROM prescriptiondata  WHERE Prescriptionid = '$presId'";
      $result1 = $mysqli->query($query1);

      if($result1 and mysqli_num_rows($result1)>0){
        $table = '<table align = center>';
        $table .= '<tr> <th>Medicine</th> <th>Quantiy</th> <th>Frequency</th> <th>Cons. Period</th><th>Note</th></tr>';
        while($resultSet1 = mysqli_fetch_assoc($result1)){
        
        $table .= '<tr>';
        $table .= '<td>'. $resultSet1['Medicines'] .'</td>';
        $table .= '<td>'. $resultSet1['Quantity'] .'</td>';
        $table .= '<td>'. $resultSet1['Frequency'] .'</td>';
        $table .= '<td>'. $resultSet1['Consumption_period'] .'</td>';
        $table .= '<td>'. $resultSet1['Note'] .'</td>';
       
        $table .= '</tr>';
      }
    $table .= '<table>';
    
    ?>
    <style type="text/css">
      table{border-collapse: collapse; align-content: center;align-self: center;}
      th {
        background-color: lightblue;
        color: white;
      }
      td, th {border : 1px solid black; padding: 10px;}

    </style>


     <?php echo "<br>"; echo "<br>"; echo $table; 

    /*}else{ ?>
      <div class="jumbotron" align="center">
          <h1 class="display-3">Yoy Have NO Reservations yet</h1>
          
      </div>

<?php */
  }
 ?>


</body>
</html>