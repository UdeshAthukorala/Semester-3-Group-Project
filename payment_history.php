<!DOCTYPE html>
<?php include "config.php";
            if(isset($_POST['employeeCategory'])){
            $selection = $_POST['employeeCategory'];
        }
        else{
            $selection = 'Doctor';
        }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment History</title>
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
          <div class="card-header"><center><h2>Employee Payment History</h2></center></div>
          
          
            
            <div class="card-body">.
                 <div class="row">
              <div class= "col-md-2">
               <form name="myform" action = "" method="POST">
                <div class="row" style="margin-left: 0;">
                <select name="employeeCategory" class="custom-select" required style="width: 150px; margin: 5px; " onchange="this.form.submit()" id = 'employeeCategory'>
                  <option value="Doctor" <?php if ($selection == 'Doctor' ) echo 'selected' ; ?>>Doctor</option>
                  <option value="Pharmacist" <?php if ($selection == 'Pharmacist' ) echo 'selected' ; ?>>Pharmacist</option>
                  <option value="Receptionist" <?php if ($selection == 'Receptionist' ) echo 'selected' ; ?>>Receptionist</option>
                  <option value="Accountant" <?php if ($selection == 'Accountant' ) echo 'selected' ; ?>>Accountant</option>

                </select>
                      </div>
                </form>
                </div>
                <div class= "col-md-10" style="padding-left:30px">
                <form method=POST action=paymentHistorySearch.php>
                
                
                <div class="row" >
                   
                <input type="text" class="form-control" name="username" placeholder="Username" style="max-width: 250px; margin: 5px;"   required pattern="[0-9A-Za-z_]{1,40}" title="Invalid character in the username" >    

                    <input type="submit" name="search" class="btn btn-light" value="Search">
                    </div>
                </form>
                </div>
                     </div>
<!--
                <script>
                    {
                        function selector(){
                            document.getElementById('employeeCategory').getElementsByTagName('option')['nurse'].selected = 'selected';
                        }
                    }
                </script>
-->
                
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
    
        $query = "SELECT * FROM employee_payments where employeeCategory='$selection'" ;
    
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