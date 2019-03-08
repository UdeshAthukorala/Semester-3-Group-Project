<?php 
include('config 2.php');


if (isset($_POST['character']) and isset($_POST['username']) and isset($_POST['password'])){
	$character = (int)$_POST['character'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$mdpassword = md5($password);
	$query = "SELECT * FROM loginuser WHERE username='$username' and characterid='$character' and password='$mdpassword'";
	$results = $mysqli->query($query);
	$num_rows = mysqli_num_rows($results);
	if ($num_rows==1 and $results){
		$_SESSION['username'] = $username;		
		$_SESSION['user_login_status'] = "alreadylogedin";
		while ($obj = $results->fetch_object()) {
			$_SESSION['username'] = $obj->username;
			$_SESSION['characterid'] = $obj->characterid;
			$_SESSION['aproval'] = $obj->aprovaladmin;
			break;
		}
        if ($character == 1){
            header("Location: PatientProfile.php");
        }
        else if($character == 2){
            header("Location: docHeader.php");
        }
        else if($character == 3){
            header("Location: pharmacyhome.php");
        }
        else if($character == 4){
            header("Location: FinanceHome.php");
        }
        else if($character == 5){
            header("Location: ReceptionistProfile.php");
        }        
	}
	else{
		$_SESSION['loginalertmsg'] = 'Character OR Password OR Username is Error';
		header("Location: index.php");
	}
}
else{
	$_SESSION['loginalertmsg'] = 'Please Fill..';
	header("Location: index.php");
}









?>