<!DOCTYPE html>
<?php include "config.php"?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Salary Payment Methods</title>
         <link rel="stylesheet" type="text/css" href="assets/css/style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     
     <link rel='stylesheet prefetch' href='assets/sweet-alert.css'>

      <link rel="stylesheet" href="assets/style.css">
</head>
<body>
  
       <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="FinanceHome.php">Financial Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="salaryPaymentMethod.php">Salary Information</a>
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
        <div class="center card border-primary mb-3" style="max-width: 70rem; margin: auto; top : 20px;">
          <div class="card-header"><center><h2>Salary Payment Methods</h2></center></div>
          
        
    
            <div class="card-body">
              
               <form action=salaryPaymentMethodFunc.php method="post" autocomplete="on">
                  <fieldset>
              
                <label class="col-form-label" >Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" style="max-width: 250px; margin: 5px;"   required pattern="[0-9A-Za-z_]{1,40}" title="Invalid character in the username" >
                <label class="col-form-label" >Bank</label>
                <input type="text" class="form-control" name="bank" placeholder="Bank Name" style="max-width: 250px; margin: 5px;"   title="Enter your bank" required pattern="[A-Za-z]{1,40}"  >
                <label class="col-form-label" >Branch</label>
                <input type="text" class="form-control" name="branch" placeholder="Branch of the Bank" style="max-width: 250px; margin: 5px;"   title="Enter branch of the bank" required pattern="[A-Za-z]{1,40}"  >  
                <label class="col-form-label" >Account Number</label>
                <input type="numbers" class="form-control" name="accountNumber" placeholder="Account Number" style="max-width: 250px; margin: 5px;"   required pattern="[0-9]{1,20}" title="Enter Account Number" >  
                
                 <button type="submit" name="submit" class="btn btn-success btn-lg" style="font-size:24px; 
                 texregchr.phpt-align:right;">Add / Update</button>
                   </fieldset>
                </form>
                                
                <div style="padding-left:10px">
                <form method=POST action=salaryPaymentMethodSearch.php>
                
                
                <div class="row" >
                   
                <input type="text" class="form-control" name="username" placeholder="Username" style="max-width: 250px; margin: 5px;"   required pattern="[0-9A-Za-z_]{1,40}" title="Invalid character in the username" >

                    <input type="submit" name="search" class="btn btn-light" value="Search">
                    </div>
                </form>
                </div>
                
           <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Bank</th>
      <th scope="col">Branch</th>
      <th scope="col">Account Number</th>
    </tr>
  </thead>
  <tbody>
      <?php
    
        

        include("config.php");
    
        $query = "SELECT * FROM salaryPaymentMethod";
    
        $run = mysqli_query($mysqli,$query);
      
        while($result = mysqli_fetch_assoc($run)){
            
           
      ?>    
        
            <tr class="table-secondary">
                <td><?php echo $result['username'] ?></td>
                <td><?php echo $result['bank'] ?></td>
                <td><?php echo $result['branch'] ?></td>
                <td><?php echo $result['accountNumber'] ?></td>
             </tr>
            
        <?php } ?>


  </tbody>
<!--
  <script src='assets/sweet-alert.min.js'></script>

  

    <script  src="assets/index.js"></script>
-->
                </table>  </div></div></div>    </body></html>
