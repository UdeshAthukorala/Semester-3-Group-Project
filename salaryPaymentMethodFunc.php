<?php include "config.php";

if (isset($_POST['submit'])){
    

    
    $username = $_POST['username'];
    $bank = $_POST['bank'];
    $branch = $_POST['branch'];
    $number = $_POST['accountNumber']; 
    
    $checkQuery = "SELECT * FROM loginuser where username = '$username'";
    $run = mysqli_query($mysqli,$checkQuery);
    
    if(mysqli_num_rows($run)){
        
    
    
    $query = "SELECT * FROM salaryPaymentMethod where username='$username'";
    
    $result = mysqli_query($mysqli,$query); 
    
        
    if(mysqli_num_rows($result)==1){
        
        $updateQuery = "update salaryPaymentMethod set bank='$bank',branch='$branch',accountNumber='$number' where username='$username'";
        $run_query = mysqli_query($mysqli,$updateQuery);
        
    }
    else{
        

    $insertQuery = "INSERT INTO salaryPaymentMethod (username,bank,branch,accountNumber) VALUES ('$username','$bank','$branch','$number')" ;

    $run_query = mysqli_query($mysqli,$insertQuery);
        
    }
    header("Location:salaryPaymentMethod.php");
    }
    
    else{
        
        header("Location:incorrectUsername.php");

    }
    
}


?>





