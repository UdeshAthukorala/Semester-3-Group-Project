<!DOCTYPE html>
<?php include "config.php";

    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Record Employee Payment</title>
         <link rel="stylesheet" type="text/css" href="assets/css/style.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
     
     <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="FinanceHome.php">Financial Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="salaryPaymentMethod.php">Salary Information</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="record_employee_payments.php">Employee Payment</a>
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
          <div class="card-header"><center><h2>Record Employee Payment</h2></center></div>
          
          
    
            <div class="card-body">
              
               <form action=record_employee_payment_func.php method="post" autocomplete="on">
                  <fieldset>
              
               <label class="col-form-label" >Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username" style="max-width: 250px; margin: 5px;"   required pattern="[0-9A-Za-z_]{1,40}" title="Invalid character in the username" >            
 
                
                                <div class="form-group" >
                  <label class="control-label">Payment Amount</label>
                  <div class="form-group">
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text">LKR</span>
                      </div>
                      <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" style="width:200px;" placeholder="Amount" required name="amount" pattern="[0-9]{1,40}" title="Enter amount to the nearest LKR" >
                   
                    </div>
                  </div>
                </div>
                <label class="col-form-label" >Date</label>
                <input type="date" class="form-control" name="date"  required max=<?php echo date('Y-m-d') ?> >
                <div class="form-group" >
                  <label class="control-label">Remarks</label>
                  <div class="form-group">
                    <div class="input-group mb-3">

                      <input type="text" class="form-control" aria-label="Enter additional details" style="width:200px;" placeholder="Remarks (optional)" name="remarks"  title="Enter additional details" >
                   
                    </div>
                  </div>
                </div>

                 <button type="submit" name="submit" class="btn btn-success btn-lg" style="font-size:24px; 
                 texregchr.phpt-align:right;">Submit</button>
                   </fieldset>
                </form>
            </div>
         </div>
    </div>


    </body>
</html>