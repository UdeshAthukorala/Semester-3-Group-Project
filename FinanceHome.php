<!DOCTYPE html>
<?php include "config.php"?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Financial Home</title>
         <link rel="stylesheet" type="text/css" href="assets/css/style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
     <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="FinanceHome.php">Financial Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="salaryPaymentMethod.php">Salary Information</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="record_employee_payments.php">Employee Payment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="payment_history.php">Payment History</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="logout.php">Logout</a>
      </li>
    </ul>
    
     <div class="container">
        <div class="center card border-primary mb-3" style="max-width: 40rem; margin: auto; top : 20px;">
          <div class="card-header"><center><h2>Welcome !!!</h2></center></div>
          <div class="card-header"><center><h3>Select an Operation</h3></center></div>
    
            <div class="card-body"></div>
            
    <div class="btn-group-vertical" data-toggle="buttons">
  <button type="button" class="btn btn-primary" onclick="location.href = 'salaryPaymentMethod.php'">View Salary Payment Information</button>
  <button type="button" class="btn btn-primary" onclick="location.href = 'record_employee_payments.php'">Record employee payments</button>
  <button type="button" class="btn btn-primary" onclick="location.href = 'payment_history.php'">Check employee payment history</button>
  <button type="button" class="btn btn-primary" onclick="location.href = 'logout.php'">Logout</button>
    </div>
         </div>
    </div>
</body>
</html>