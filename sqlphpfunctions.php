<?php include 'config.php'; ?>

<?php 
function splidtospl($sid){
	$query = "SELECT `anyspecialization` FROM `specialization` WHERE `specializationid` = '$sid';";
	$results = $GLOBALS['mysqli']->query($query);
	if ($results){
  		while ($obj = $results->fetch_object()) {
    		$spl = $obj->anyspecialization;
    		return $spl;
    	}
    }else{
    	return "Error";
    }
}

function spltosplid($spl){
	$query = "SELECT `specializationid` FROM `specialization` WHERE `anyspecialization` = '$spl';";
	$results = $GLOBALS['mysqli']->query($query);
	if ($results){
  		while ($obj = $results->fetch_object()) {
    		$spl = $obj->specializationid;
    		return $spl;
    	}
    }else{
    	return "Error";
    }
}

function allsplidtospl($idlist){
	$idli = explode(',', $idlist);
	$allspl = '';
	foreach ($idli as $id) {
	 	$allspl .= splidtospl($id).',';
	}
	$tallspl = rtrim($allspl,",");
	return $tallspl;
}

function allspltosplid($spllist){
	$splli = explode(',', $spllist);
	$allid = '';
	foreach ($splli as $spl) {
	 	$allid .= spltosplid($spl).',';
	}
	$tallid = rtrim($allid,",");
	return $tallid;
}

?>