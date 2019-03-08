<!DOCTYPE html>
<?php include "config.php"?>
<html>
<head>
    <title>INVENTORY</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">

</head>
<body>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="pharmacyhome.php">Home <span class="sr-only">(current)</span></a>
      </li>

      
        <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
    
  </div>

<!--     <div class="progress">
      <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
        60%
      </div>
    </div> -->
<div style=padding-top:20px; class= "container">
    <?php
        include "config.php";
        // Check connection
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }

        $sql = "SELECT drugcode, drugname, qty, dosage, expirydate FROM medicine";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $remain = $row["qty"] *100 /$row["dosage"];
                if ($remain < 25){
                    echo "Drug Code: " . $row["drugcode"]. " - Drug Name: " . $row["drugname"]. " "."<div class='progress'>"."<div class='progress-bar progress-bar-danger' role='progressbar' aria-valuenow='$remain' aria-valuemin='0' aria-valuemax='100' style='width: $remain%;'>"."</div>"."</div>";
                }else if($remain > 25 & $remain < 50){
                    echo "Drug Code: " . $row["drugcode"]. " - Drug Name: " . $row["drugname"]. " "."<div class='progress'>"."<div class='progress-bar progress-bar-warning' role='progressbar' aria-valuenow='$remain' aria-valuemin='0' aria-valuemax='100' style='width: $remain%;'>"."</div>"."</div>";
                }
                else {
                    
                    echo "Drug Code: " . $row["drugcode"]. " - Drug Name: " . $row["drugname"]. " "."<div class='progress'>"."<div class='progress-bar progress-bar-info' role='progressbar' aria-valuenow='$remain' aria-valuemin='0' aria-valuemax='100' style='width: $remain%;'>"."</div>"."</div>";
                }
                
            }
        } else {
            echo "0 results";
        }

         ?>

  </div>      
</body>
</html>