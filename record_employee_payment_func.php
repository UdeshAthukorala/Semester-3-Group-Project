    <?php

include "config.php";

if (isset($_POST['submit'])){
    
    $username = $_POST['username'];
 //   $employeeCategory = $_POST['employeeCategory'];
   
    $date = $_POST['date'];
    $amount = $_POST['amount'];
    $remarks = $_POST['remarks'];

    $checkQuery = "SELECT * FROM loginuser where username = '$username'";
    $run = mysqli_query($mysqli,$checkQuery);
    
    if(mysqli_num_rows($run)){
        
                $query1 = "SELECT * FROM loginuser where username = '$username'";
            $run1 = mysqli_query($mysqli,$query1);
            $result1 = mysqli_fetch_assoc($run1);
                
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
        $employeeCategory = $category;
        
    $insertQuery = "INSERT INTO employee_payments (username,employeeCategory,date,amount,remarks) VALUES ('$username','$employeeCategory','$date','$amount','$remarks')" ;

    $run_query = mysqli_query($mysqli,$insertQuery);
        header("Location: record_employee_payments.php");
    }
    else{
        header("Location:incorrectUsername.php");
    }

}


?>