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
        <a class="nav-link active" data-toggle="tab" href="salaryPaymentMethod.php">Salary Information</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="record_employee_payments.php">Employee Payment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="payment_history.php">Payment History</a>
      </li>
            <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="logout.php">Logout</a>
      </li>
    </ul>

     <div class="container">
        <div class="center card border-primary mb-3" style="max-width: 60rem; margin: auto; top : 20px;">
          <div class="card-header"><center><h2>Search Results</h2></center></div>
          
        <?php
    


        include("config.php");
    
        $query = "SELECT * FROM salaryPaymentMethod where username='$username'" ;
        
        $run = mysqli_query($mysqli,$query);
        $result = mysqli_fetch_assoc($run);
        if((mysqli_num_rows($run)==0) ){

            $employeeId = 'not available';
            $bank = 'not available';
            $branch = 'not available';
            $number = 'not available';
            $category = 'not available';
            

        }
            else{
            $query1 = "SELECT * FROM loginuser where username = '$username'";
            $run1 = mysqli_query($mysqli,$query1);
            $result1 = mysqli_fetch_assoc($run1);
                $username = $result['username'];
                $bank = $result['bank'];
                $branch = $result['branch'];
                $number = $result['accountNumber'];
            $category1 = $result1['characterid'];
            if(($category1==2)){
                $category = 'Doctor';
            }
            elseif(($category1==3)){
                $category = 'Pharmacist';
            }
            elseif(($category1==4)){
                $category = 'Accountant';
            }
            elseif(($category1==5)){
                $category = 'Receptionist';
            }
            }
            
           
      ?>         
        
            <div class="card-body">
             <a href="salaryPaymentMethod.php" class="btn btn-primary">Go Back</a>

             <br><label class="col-form-label" >Username     : </label>
             <label class="col-form-label" ><?php echo $username ?></label>
             <br><label class="col-form-label" >Employee Category : </label>
             <label class="col-form-label" ><?php echo $category ?></label>
             <br><label class="col-form-label" >Bank              : </label>
             <label class="col-form-label" ><?php echo $bank ?></label>
             <br><label class="col-form-label" >Branch            : </label>
             <label class="col-form-label" ><?php echo $branch ?></label>
             <br><label class="col-form-label" >Account Number    : </label>
             <label class="col-form-label" ><?php echo $number ?></label>

   
 </div></div></div></body></html>