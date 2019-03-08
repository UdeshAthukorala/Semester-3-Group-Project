<?php
include('config.php');
include('loginfirst.php');

if (!array_key_exists("loginalertmsg",$_SESSION)) {
  $_SESSION['loginalertmsg'] = '';
}
?>

<?php
if (isset($_POST['dob'])) {
  $birthDate = $_POST['dob'];
  $birthDate = explode("-", $birthDate);
  $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[1], $birthDate[2], $birthDate[0]))) > date("md")
    ? ((date("Y") - $birthDate[0]) - 1)
    : (date("Y") - $birthDate[0]));

  if ($age>125) {
  	$_SESSION['regalertmsg'] = 'Why Your age is Too big?';
	header("Location: RegisterPatientRec.php"); die();
  }
  elseif($age<=0){
  	$_SESSION['regalertmsg'] = 'I think you are not even born now';
	header("Location: RegisterPatientRec.php"); die();
  }
  elseif($age<=12){
  	$_SESSION['regalertmsg'] = "With the help of your parents and book throw the parent's account";
	header("Location: RegisterPatientRec.php"); die();
  }
}

if(isset($_POST['username'])){
	$username = $_POST['username'];
	$query = "SELECT * FROM loginuser WHERE username='$username'";
	$results = $mysqli->query($query);
	$num_rows = mysqli_num_rows($results);
	if ($num_rows>=1) {
		$_SESSION['regalertmsg'] = "Username alreday taken";
		header("Location: RegisterPatientRec.php"); die();
	}elseif($num_rows==0){
		$title =  isset($_POST['title']) ? $_POST['title'] : '' ;
		$gender = isset($_POST['gender']) ? $_POST['gender'] : '' ;
		$dob = isset($_POST['dob']) ? $_POST['dob'] : '' ;
		$address = isset($_POST['address']) ? $_POST['address'] : '' ;
		$contactno = isset($_POST['Contactno']) ? $_POST['Contactno'] : '' ;
		$email = isset($_POST['email']) ? $_POST['email'] : '' ;
		$password = isset($_POST['password1']) ? $_POST['password1'] : '' ;
		$md5password = md5($password);
		$username = isset($_POST['username']) ? $_POST['username'] : '' ;
		$lname = isset($_POST['lname']) ? $_POST['lname'] : '' ;
		$fname = isset($_POST['fname']) ? $_POST['fname'] : '' ;
		$characterid = isset($_POST['character']) ? (int)$_POST['character'] : '' ;
		$bloodgroup = isset($_POST['bloodgroup']) ? $_POST['bloodgroup'] : '' ;
		$healthissue = isset($_POST['healthissue']) ? $_POST['healthissue'] : '' ;
		$createdby = $_SESSION['username'];

		$currenttime = time();
		//echo $username.$characterid.$fname.$lname.$email.$Contactno.$address.$dob.$gender;

		$query1 = "INSERT INTO `loginuser` (`username`, `password`, `characterid`, `aprovaladmin`) VALUES ('$username', '$md5password', '$characterid', 1)";
		$results1 = $mysqli->query($query1);
		$query2 = "INSERT INTO `basicdetailpatient` (`title` , `username`, `characterid`, `firstname`, `lastname`, `email`, `contactno`, `address`, `dob`, `gender`,`bloodgroup`,`healthissue`, `registertimestamp`, `createdby`) VALUES ('$title' , '$username', '$characterid', '$fname', '$lname', '$email', '$contactno', '$address', '$dob', '$gender', '$bloodgroup', '$healthissue', '$currenttime', '$createdby');";
		$results2 = $mysqli->query($query2);
		if($results1 and $results2){
			//$_SESSION['user_login_status'] = "alreadylogedin";
			//$_SESSION['username'] = $username;
			//$_SESSION['characterid'] = $characterid;
			header("Location: WaitingAprovalRec.php"); die();
		}
		else{
			if($mysqli->errno=="1062")
			{
				$_SESSION['regalertmsg'] = "Username alreday taken";
				header("Location: RegisterPatientRec.php"); die();
			}
			else
			{
				echo "<p class='text-danger' style='text-align: center;'> Failed, Could not save!</p>";
			}
		}

	}
}


?>

