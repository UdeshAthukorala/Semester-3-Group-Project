<!DOCTYPE html>
<?php include "config.php";
            if(isset($_POST['search'])){
            $id = $_POST['employeeId'];
        }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Incorrect Username</title>
         <link rel="stylesheet" type="text/css" href="assets/css/style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

     <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="FinanceHome.php">Financial Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="record_patient_payment.php">Patient Payment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="record_employee_payments.php">Employee Payment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="payment_history.php">Payment History</a>
      </li>
            <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="logout.php">Logout</a>
      </li>
    </ul>

     <div class="container">
        <div class="center card border-primary mb-3" style="max-width: 60rem; margin: auto; top : 20px;">
          <div class="card-header"><center><h2>Username Not Found</h2></center></div>
          
      
        
            <div class="card-body">
             <a href="FinanceHome.php" class="btn btn-primary">Go Back</a>
             <br><label class="col-form-label" >Incorrect Username </label>


   
 </div></div></div></body></html>