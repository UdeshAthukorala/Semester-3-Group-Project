<!DOCTYPE html>
<?php include "config.php"?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="flatly.css">
</head>
<body>
	<?php
	include "config.php";
	// Check connection
	if ($mysqli->connect_error) {
	    die("Connection failed: " . $mysqli->connect_error);
	}


	function add($drugcode, $drugname,  $mfrname, $dosage, $qty, $batchno, $expdate, $price, $vat, $total, $mysqli){
		if(!empty($drugname)){
			$insertQuery = "INSERT INTO medicine(drugcode, drugname, mfrname, dosage, qty, batchno, expirydate, price, vat, total) VALUES ('$drugcode', '$drugname',  '$mfrname', '$dosage', '$qty', '$batchno', '$expdate', '$price', '$vat', '$total')";
			if(mysqli_query($mysqli, $insertQuery)){
				echo "<div class='alert alert-dismissible alert-warning'>
					  <button type='button' class='close' data-dismiss='alert'>&times;</button>
					  
					  <p class='mb-0'>Entry for Drugcode : $drugcode , Submitted successfully <a href='addnewmedicine.php' class='alert-link'>Want Order More?</a>.</p>
					</div>";
				
				// echo "<a href='update.php'>BACK</a>";
			}else{
				echo "<div class='alert alert-dismissible alert-danger'>";
				echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
				echo "<strong>Error!</strong> <a href='#' class='alert-link'>Duplicate entry for Drug Code $drugcode</a> Use new Code and try submitting again.";
  				echo "</div>";
  				
				
				

			}

		}
	}

	

	if(isset($_POST['submit'])){
	
	//calling the add function
		if(!empty($_POST['drugcode1'])){

			add($_POST['drugcode1'], $_POST['drugname1'],  $_POST['mfrname1'],  $_POST['dosage1'], $_POST['qty1'], $_POST['batchno1'], $_POST['expdate1'], $_POST['price1'], $_POST['vat1'], $_POST['total1'], $mysqli);
		}

		if(!empty($_POST['drugcode2'])){

			add($_POST['drugcode2'], $_POST['drugname2'],  $_POST['mfrname2'],  $_POST['dosage2'], $_POST['qty2'], $_POST['batchno2'], $_POST['expdate2'], $_POST['price2'], $_POST['vat2'], $_POST['total2'], $mysqli);
		}
		if(!empty($_POST['drugcode3'])){

			add($_POST['drugcode3'], $_POST['drugname3'],  $_POST['mfrname3'],  $_POST['dosage3'], $_POST['qty3'], $_POST['batchno3'], $_POST['expdate3'], $_POST['price3'], $_POST['vat3'], $_POST['total3'], $mysqli);
		}

		if(!empty($_POST['drugcode4'])){

			add($_POST['drugcode4'], $_POST['drugname4'],  $_POST['mfrname4'],  $_POST['dosage4'], $_POST['qty4'], $_POST['batchno4'], $_POST['expdate4'], $_POST['price4'], $_POST['vat4'], $_POST['total4'], $mysqli);
		}
		if(!empty($_POST['drugcode5'])){

			add($_POST['drugcode5'], $_POST['drugname5'],  $_POST['mfrname5'],  $_POST['dosage5'], $_POST['qty5'], $_POST['batchno5'], $_POST['expdate5'], $_POST['price5'], $_POST['vat5'], $_POST['total5'], $mysqli);
		}
		echo "<a href='addnewmedicine.php'>ADD MORE MEDICINE STOCKS</a><br>";

	}


?>

</body>
</html>
