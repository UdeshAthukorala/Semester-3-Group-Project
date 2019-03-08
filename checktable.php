<!DOCTYPE html>
<html>
<?php include "config.php"?>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="flatly.css">
</head>
<body>
	<?php
		include "config.php";
		
		if(isset($_POST['submit'])){
			$patusername = $_POST['username'];
			
			$sql = "SELECT prescriptionid FROM visitingdata WHERE patusername = '$patusername'";
			$result = $mysqli->query($sql);

			if ($result->num_rows > 0) {
				while($row = mysqli_fetch_assoc($result)) {
			        $prescriptionid = $row["prescriptionid"];
			    }
			    // output data of each row
			    echo "<div class='jumbotron'>
					  <h1 class='display-3'>Valid Patient!</h1>
					  <p class='lead'></p>
					  <hr class='my-4'>
					  <p></p>
					  <p class='lead'>
					    <form method='POST' action='issueindex.php' >
					    Prescriptionid:<br>
					    <input type='text' name='regnum' value='$prescriptionid'>    
					    <input type='submit' name='submit' value='Make Order'>
					  </form>
					  </p>
					</div>";
			} else {
			    echo "<div class='jumbotron'>
			  <h1 class='display-3'>Warning..Invalid Patient!</h1>
			  <p class='lead'></p>
			  <hr class='my-4'>
			  <p></p>
			  <p class='lead'>
			    <a class='btn btn-primary btn-lg' href='cancel.php' role='button'>Cancel</a>
			  </p>
			</div>";
			}
			$mysqli->close();
			
		}
		

	?>
</body>
</html>
