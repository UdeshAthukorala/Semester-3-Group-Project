<?php
if(session_id() == '') { session_start(); }
if (!array_key_exists("loginalertmsg",$_SESSION)) {
  $_SESSION['loginalertmsg'] = '';
}
if (!array_key_exists('aproval',$_SESSION)) {
  $_SESSION['aproval'] = '';
}
if (!array_key_exists("user_login_status",$_SESSION)) {
  $_SESSION['user_login_status'] = '';
}


if($_SESSION['user_login_status'] == "alreadylogedin"){
  if($_SESSION['aproval']==0){
  	header("Location: waitingaproval.php"); die();
  }
  if($_SESSION['aproval']==-1){
  	header("Location: deniedapproval.php"); die();
  }
}else{
	$_SESSION['loginalertmsg'] = 'Please Login First';
	header("Location: index.php"); die();
}
?>