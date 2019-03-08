<?
include('config.php');
include('loginfirst.php');

if (!array_key_exists("regalertmsg",$_SESSION)) {
  $_SESSION['regalertmsg'] = '';
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
	header("Location: RegisterStaffRec.php"); die();
  }
  elseif($age<=0){
  	$_SESSION['regalertmsg'] = 'I think you are not even born now';
	header("Location: RegisterStaffRec.php"); die();
  }
  elseif($age<=16){
  	$_SESSION['regalertmsg'] = "Are you really working at this young age?";
	header("Location: RegisterStaffRec.php"); die();
  }
}

if(isset($_POST['username'])){
	$username = $_POST['username'];
	$query = "SELECT * FROM loginuser WHERE username='$username'";
	$results = $mysqli->query($query);
	$num_rows = mysqli_num_rows($results);
	if ($num_rows>=1) {
		$_SESSION['regalertmsg'] = "Username alreday taken";
		header("Location: RegisterStaffRec.php"); die();
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
		$currenttime = time();
		//echo $username.$characterid.$fname.$lname.$email.$Contactno.$address.$dob.$gender;

		$query1 = "INSERT INTO `loginuser` (`username`, `password`, `characterid`) VALUES ('$username', '$md5password', '$characterid')";
		$results1 = $mysqli->query($query1);
		$query2 = "INSERT INTO `basicdetailstaff` (`title`, `username`, `characterid`, `firstname`, `lastname`, `email`, `contactno`, `address`, `dob`, `gender`, `registertimestamp`) VALUES ('$title', '$username', '$characterid', '$fname', '$lname', '$email', '$contactno', '$address', '$dob', '$gender', '$currenttime');";
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
				header("Location: RegisterStaffRec.php"); die();
			}
			else
			{
				echo "<p class='text-danger' style='text-align: center;'> Failed, Could not save!</p>";
			}
		}

	}
}


?>

