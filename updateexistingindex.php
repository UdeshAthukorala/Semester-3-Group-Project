
<!DOCTYPE html>
<?php include "config.php"?>
<html>
<head>
	<title>Update</title>
	<link rel="stylesheet" type="text/css" href="flatly.css">
</head>
<body>
<?php
include "config.php";
// Check connection


if(isset($_POST['submit'])){
		
		$drugcode = $_POST['drugcode'];
		$drugname = $_POST['drugname'];		
		$qty = $_POST['qty'];
		$batchno = $_POST['batchno'];
		$expirydate = $_POST['expirydate'];
		$price = $_POST['price'];
		$vat = $_POST['vat'];
		$total = $_POST['total'];
		
		$sql = "SELECT drugname FROM medicine WHERE drugcode = '$drugcode'";
		$result = $mysqli->query($sql);

			if ($result->num_rows > 0){
				$sql = "UPDATE medicine SET drugname = '$drugname', qty = '$qty', batchno ='$batchno', expirydate ='$expirydate', price ='$price', vat = '$vat', total ='$total' WHERE drugcode= '$drugcode'";

		

				if(mysqli_query($mysqli, $sql)){
					echo "<div class='alert alert-dismissible alert-primary'>
							  <button type='button' class='close' data-dismiss='alert'>&times;</button>
							  
							  <p class='mb-0'>Entry for Drugcode : $drugcode , Submitted successfully <a href='updateexisting.php' class='alert-link'>Want Order More?</a>.</p>
							</div>";
				}else{
					echo "Error updating record: " . $mysqli->error;
				}

			}else{
				echo "<div class='alert alert-dismissible alert-warning'>
					  <button type='button' class='close' data-dismiss='alert'>&times;</button>
					  <h4 class='alert-heading'>Warning!</h4>
					  <p class='mb-0'>Drugcode : $drugcode , No such stock... <a href='orderstock.php' class='alert-link'>Want Order?</a>.</p>
					</div>";
			}

		
	}

	?>

</body>
</html>
