<!DOCTYPE html>
<?php include "config.php"?>
<html>
<head>
	<title>Take Payment</title>
	<link rel="stylesheet" type="text/css" href="flatly.css">
</head>
<body>
	<?php

	include "config.php";

	function update($mysqli, $drugname, $needQty){
				$select = "SELECT qty FROM medicine WHERE drugname = '$drugname'";
				$result = $mysqli -> query($select);
				while($row = $result->fetch_assoc()) {
					if($row["qty"]> $needQty){
						$left = $row["qty"]- $needQty;
		             	$update = "UPDATE medicine SET qty = '$left' WHERE drugname = '$drugname'" ;
		             	if(!mysqli_query($mysqli, $update)){			
							echo "Not updated";
						}else{
							
						}
					}
					
				}
	}
	if(isset($_POST['submit'])){

			$today = $_POST['today'];
			$exp = $_POST['exp'];
			if($_POST['today']> $_POST['exp']){
				echo "card expired";
			}else{
				$username = $_POST['username'];

				$presid = $_POST['presid'];
				$total = $_POST['amount'];
                
                $checkQuery = "SELECT * FROM loginuser where username = '$username'";
    $run = mysqli_query($mysqli,$checkQuery);
    
    if(mysqli_num_rows($run)){
                
				$sql = "SELECT  Medicines, Quantity, Frequency, Consumption_period FROM prescriptiondata WHERE prescriptionid = '$presid'";
		        $result = $mysqli->query($sql);
		        if ($result->num_rows > 0) {
		        	while($row = $result->fetch_assoc()) {
		            $drugname = $row["Medicines"];
		        	$needQty = $row["Quantity"]*$row["Frequency"]*$row["Consumption_period"];	        	
		        	update($mysqli, $drugname, $needQty);
		        	
		     	   }	     	   
		    	}


				$sql = "INSERT INTO incometable(date, username, total) VALUES ('$today', '$username', '$total')";
					if ($mysqli->query($sql) === TRUE) {
					    echo "<div class='alert alert-dismissible alert-primary'>
						  <button type='button' class='close' data-dismiss='alert'>&times;</button>
						  <strong></strong> <a href='issue.php' class='alert-link'>Submit another</a> Payment submitted successfully.
						</div>";
					} else {
					    echo "Error: " . $sql . "<br>" . $mysqli->error;
					}}
                else{
                    echo "<a href='issue.php' class='alert-link'>Submit another</a>";
                }
                
			}
			
			
			

		
	}


	
	?>


</body>
</html>