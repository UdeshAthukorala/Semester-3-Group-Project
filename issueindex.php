<!DOCTYPE html>
<?php include "config.php"?>
<html>
<head>
	<title>ISSUE</title>
	<link rel="stylesheet" type="text/css" href="flatly.css">
<!-- 	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
 --></head>
<body>
	<?php
	
	include "config.php";
	
		        // Check connection
		

	static $numberOfErrors = 0;
	static $totalPrice; // check whether all the medicine in prescription available.
	static $mediarray;
	function procedure($drugname, $mysqli,$needQty){
		global $numberOfErrors;
		global $totalPrice;
		global $mediarray;
		$select = "SELECT qty, total FROM medicine WHERE drugname = '$drugname'";
		$result = $mysqli -> query($select);
		if ($result->num_rows > 0){
			while($row = $result->fetch_assoc()) {
			    if($row["qty"]> $needQty){
			    	$cost = $row["total"]*$needQty;
			    	$totalPrice = $totalPrice + $cost;
			    	$mediarray[$drugname] = "$cost";
			        // echo "hariiiiiiiiiiiii"."<br>";

			    }else{
			    	$numberOfErrors = $numberOfErrors + 1;
			        echo "<div class='alert alert-dismissible alert-warning'>
					  <button type='button' class='close' data-dismiss='alert'>&times;</button>
					  <h4 class='alert-heading'>Warning!</h4>
					  <p class='mb-0'>Drugname : $drugname , Not sufficient stock... <a href='orderstock.php' class='alert-link'>Want Order?</a>.</p>
					</div>";
			             	
			    }
			}

		}else{
			$numberOfErrors = $numberOfErrors + 1;
			echo "<div class='alert alert-dismissible alert-danger'>"."<button type='button' class='close' data-dismiss='alert'>&times;</button>
			<h4 class='alert-heading'>Warning!</h4><strong> Drugname : $drugname , Not available in stock</strong> <a href='orderstock.php' class='alert-link'>Want order?</a>"."</div>";
			
		}
		
	}
				
			if(isset($_POST['submit'])){
			$thepatientregnum = $_POST['regnum'];
		
			
			$sql = "SELECT  Medicines, Quantity, Frequency, Consumption_period FROM prescriptiondata WHERE prescriptionid = '$thepatientregnum'";
	        $result = $mysqli->query($sql);

	        if ($result->num_rows > 0) {
	        	while($row = $result->fetch_assoc()) {
	            $drugname = $row["Medicines"];
	        	$needQty = $row["Quantity"]*$row["Frequency"]*$row["Consumption_period"];
	        	// echo "need qty :".$needQty."<br>";

	        	procedure($drugname,$mysqli,$needQty);	        	        	
				}
				echo "<div class='container'><table class='table table-hover'>
				  <thead>
				    <tr>
				      <th scope='col'>Drug Name</th>
				      <th scope='col'>Cost</th> 		      
				     
				    </tr>
				  </thead>
				  <tbody>  ";
			foreach($mediarray as $x => $x_value) {
				echo "<tr class='table-success'>";
				echo "<td>$x</td>";
				echo "<td>$x_value</td>";

			    
			}
			echo "<thead>
				    <tr>
				      <th scope='col'>Total Cost</th>
				      <th scope='col'>$totalPrice</th> 		      
				     
				    </tr>
				  </thead>";
			echo "</tbody>
			</table> </div>";
			if($numberOfErrors > 0){
    			echo "<div class='alert alert-dismissible alert-primary'>
				  <button type='button' class='close' data-dismiss='alert'>&times;</button>
				  <h4 class='alert-heading'>Choose!</h4>
				  <strong>All not Available!</strong> <a href='paymentselect.php' class='alert-link'>Issue available?</a> <a href='cancel.php' class='alert-link'>Cancel Order?</a>
				</div>";
			}else{
				echo "<div class='alert alert-dismissible alert-primary'>
				  <button type='button' class='close' data-dismiss='alert'>&times;</button>
				  <h4 class='alert-heading'>Issue</h4>
				  <strong></strong> <a href='paymentselect.php' class='alert-link'>Issue </a> <a href='cancel.php' class='alert-link'>Cancel Order?</a>
				</div>";
			}
	        }else{
	        	echo "<div class='alert alert-dismissible alert-primary'>
				  <button type='button' class='close' data-dismiss='alert'>&times;</button>
				  <h4 class='alert-heading'>No Entry For the prescriptionid</h4>
				  
				</div>";
	        }
	        

    		
			// echo $mediarray;
			

			}  

			$mysqli->close();
	?>

	



</body>
</html>
