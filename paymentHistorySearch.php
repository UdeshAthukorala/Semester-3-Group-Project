<!DOCTYPE html>
<?php include "config.php";
            if(isset($_POST['search'])){
            $username = $_POST['username'];
        }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results</title>
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
        <a class="nav-link active" href="payment_history.php">Payment History</a>
      </li>
            <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="logout.php">Logout</a>
      </li>
    </ul>

     <div class="container">
        <div class="center card border-primary mb-3" style="max-width: 60rem; margin: auto; top : 20px;">
          <div class="card-header"><center><h2>Search Results</h2></center></div>
          
          
        
            <div class="card-body">
             <a href="payment_history.php" class="btn btn-light">Go Back</a>
              
           <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Payment Id</th>
      <th scope="col">Username</th>
      <th scope="col">Employee Category</th>
      <th scope="col">Amount</th>
      <th scope="col">Date</th>
      <th scope="col">Remarks</th>
    </tr>
  </thead>
  <tbody>
      <?php
    


        include("config.php");
    
        $query = "SELECT * FROM employee_payments where username='$username'" ;
    
        $run = mysqli_query($mysqli,$query);
      
        while($result = mysqli_fetch_assoc($run)){
            
           
      ?>    
        
            <tr class="table-secondary">
                <td><?php echo $result['paymentId'] ?></td>
                <td><?php echo $result['username'] ?></td>
                <td><?php echo $result['employeeCategory'] ?></td>
                <td><?php echo $result['amount'] ?></td>
                <td><?php echo $result['date'] ?></td>
                <td><?php echo $result['remarks'] ?></td>
             </tr>
            
        <?php } ?>


  </tbody>
                </table> </div></div></div></body></html>