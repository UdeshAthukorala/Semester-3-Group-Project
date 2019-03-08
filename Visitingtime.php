<?php include ('docHeader.php'); 


?>

<link rel="stylesheet" type="text/css" href="assets/css/extrastyle.css">
<style type="text/css">
	table, th, td {
    border: 1px solid blue;
    border-collapse: collapse;
}
</style>
<link rel="stylesheet" type="text/css" href="assets/css/extrastyle.css">
<div class="form-group" >
	<form action="" method="post" ><fieldset>
		<div class="form-group">
              <select class="custom-select" id="getapid" name="getapid" style="width: 480px;" required>
              	<?php 
              		$now = time() + 7200;
              		$username = $_SESSION['username'];
					$query1 = "SELECT * FROM `docappointment` WHERE `username` = '$username' and `appointmentto` > '$now' ORDER BY appointmentfrom ASC";
					$results1 = $mysqli->query($query1);
					if ($results1 and mysqli_num_rows($results1)>0){ 
	  					while ($obj = $results1->fetch_object()) {
	  						if(!isset($_GET['phpapidp'])){ $_GET['phpapidp'] = $apid;}
	  						$apid = $obj->appointmentid;
	    					$apfrom = $obj->appointmentfrom;
	    					$apto = $obj->appointmentto;
	    					$maxpet = $obj->maxnoofpatient;
	    					$regpet = $obj->noofregisteredpatients;
	    					$date = date("F j, Y", $apfrom);
	    					$stime = date("g:i A", $apfrom);
	    					$etime = date("g:i A", $apto);
	    					$week = date("l", $apfrom);
              		?>
                <option value="<?php echo $apid ?>" <?php if(isset($_GET['phpapidp']) and $_GET['phpapidp']==$apid){ echo "selected";} ?>  ><?php echo $date.' : '.$stime.' - '.$etime." ( ".$regpet." / ".$maxpet." )"." ID - ".$apid;   ?></option>
            		<?php } } ?>
              </select>
            </div>
		<label class="col-form-label" for="inputDefault">Enter Patient Username From Receipt<br></label>
		<div class="row">
			<select class="custom-select" id="username" placeholder="Patient Username" name="username" style="width: 250px; margin: 5px;" required title="No body Reserved">
				              	<?php 
				    $appointid = $_GET['phpapidp'];
					$query1 = "SELECT * FROM `patientreservationdetails` WHERE `appointmentId` = '$appointid' and completeReservation = 0 ORDER BY chanelNo ASC";
					$results1 = $mysqli->query($query1);
					if ($results1 and mysqli_num_rows($results1)>0){ 
	  					while ($obj = $results1->fetch_object()) {
	  						$patuname = $obj->patientUsername;
	  						$chanalNo = $obj->chanelNo;
	  						$resID = $obj->ReservationID;
              		?>
                <option  value="<?php echo $patuname ?>"  ><?php echo $chanalNo.' : '.$patuname.' - ( '.$resID.' )';   ?></option>
            		<?php } } ?>
			</select>
			<button type="submit" class="btn btn-outline-info" style="margin: 5px 20px;">Visit Patient</button>
		</div>
		</fieldset>
	</form>
</div>

<?php 
if(isset($_POST['username'])){
	$username = $_POST['username'];
	$query = "SELECT * FROM basicdetailpatient WHERE `username`= '$username'";
	$results = $mysqli->query($query);
	if (mysqli_num_rows($results)==1 and $results){
		$bdp = $results->fetch_object();
		$Name = $bdp->title.". ".$bdp->firstname." ".$bdp->lastname;
		$gender = $bdp->gender==1?"Male":"Female";
		$address = $bdp->address;
		$dob = $bdp->dob;
		$age = floor((time() - strtotime($dob))/31556926);
		$bloodgroup = $bdp->bloodgroup;
		$email = $bdp->email;
		$contactno = $bdp->contactno;
		$healthissue = $bdp->healthissue;
		$queryvisit = "SELECT * FROM visitingdata WHERE `patusername`= '$username' ORDER BY `submittime` DESC";
		$resultsvisit = $mysqli->query($queryvisit);
?>

<div class="row">
	<div class="card bg-light mb-3" style="width: 60%; margin: 0 25px 0 0">
	  <div class="card-header">Visiting Time</div>
	  <div class="card-body">
	  	<form action="bookvisitdatafunc.php" method="post"><fieldset>
	    <h4 class="card-title">Doctor Note</h4>
	    	<div class="form-group">
		      <label for="exampleTextarea">Visiting details</label>
		      <textarea class="form-control" name="doctornote" rows="3" spellcheck="true" style="z-index: auto; position: relative; line-height: 22.5px; font-size: 15px; transition: none; background: none 0% 0% / auto repeat scroll padding-box padding-box rgb(255, 255, 255);" required></textarea>
		    </div>

		    <div class="toggle-component">
			    <h4 class="card-title">Next Visiting</h4>
			    <label class="toggle">
			        <input type="checkbox" name="nvCheck" id="nvCheck" onclick="visitclick()"/>
		        	<div data-off="No." data-on="Yes.">Next Visiting</div>
		    	</label>
		    	<input type="number" name="numofrows" value=2 id="numofrows" hidden>
		    	<input type="text" name="patusername" value="<?php echo $username; ?>"   hidden>
		    	<input type="text" name="resverid" value="<?php echo $resID; ?>"   hidden>
		    	<input type="text" name="apoid" value="<?php echo $appointid; ?>"   hidden>
		    	<div class="row" > &nbsp &nbsp &nbsp After &nbsp  
		    	<input  name="inputdays" id="idinputdays" disabled = true class="form-control" placeholder="" min=1 max=31  style="width:70px; height: 25px; margin: 0px; " required> &nbsp Days </div>
		 	</div>

		<h4 class="card-title">Prescription</h4>
		 	<table id="myTable">
		 		<col width=40%>
  				<col width=10%>
  				<col width=10%>
  				<col width=10%>
  				<col width=30%>
			  <tr>
			    <th>Medicines</th>
			    <th>Quantity</th>
			    <th>Frequency</th>
			    <th>Consumption period</th>
			    <th>Note</th>
			  </tr>
			  <tr>
			    <td><input type="text" class="form-control"  name="ptme1"></td>
			    <td><input type="text" class="form-control"  name="ptqu1"></td>
			    <td><input type="text" class="form-control"  name="ptfr1"></td>
			    <td><input type="text" class="form-control"  name="ptcp1"></td>
			    <td><input type="text" class="form-control"  name="ptnt1"></td>
			  </tr>
			</table>
			<div>
				<center>
					<button type="button" class="btn btn-rowadddel" style="margin: 20px; color: lightblue" onclick="addrow()"><img src="assets/image/addrowicon.png" style="height: 40.4px; width: 53.2px;" /></button>

					<button type="button" class="btn btn-rowadddel"   style="margin: 20px; color: lightblue" onclick="deleterow()" ><img src="assets/image/delrowicon.png" style="height: 40.4px; width: 53.2px;" /></button>
				</center>
			</div>
			<center> <button type="submit" name="submitvisit" style="width: 300px; height: 50px; font-size: 20px;" class="btn btn-outline-primary">Submit</button> </center>
		</fieldset></form>
	  </div>
	</div>

	<div class="card border-secondary mb-3" style="width: 35%;">
	  <div class="card-header">Patient - Username</div>
	  <div class="card-body">
	    <h4 class="card-title"><?php echo $Name; ?></h4>
	    <p class="card-text">
	    	<b>Age :         </b> <?php echo $age." (".$dob.")"; ?> <br />
	    	<b>Gender :      </b> <?php echo $gender; ?> <br />
	    	<b>Blood Group : </b> <?php echo $bloodgroup; ?> <br />
	    	<b>E-mail :      </b> <?php echo $email; ?><br />
	    	<b>Contact No :  </b> <?php echo $contactno; ?><br />
	    	<b>Address :     </b> <?php echo $address; ?><br />
	    	<?php if (is_null($healthissue)) { ?>
	    	<b>Health Issue :     </b><?php echo $healthissue; ?><br />
	    	<?php  }  ?>
	    </p>

	    <?php if (mysqli_num_rows($resultsvisit)>=1 and $resultsvisit){
	    	while ($obj = $resultsvisit->fetch_object()) {
		    	$visit_on = $obj->submittime;
		    	$visiton = date("F j, Y - g:i A", $visit_on);
		    	$docusname = $obj->docusername;
		    	$queryd = "SELECT * FROM basicdetaildoctor WHERE `username`= '$docusname'";
				$resultsd = $mysqli->query($queryd);
				if (mysqli_num_rows($resultsd)==1 and $resultsd){
					$bdd = $resultsd->fetch_object();
					$dName = " ".$bdd->title." ".$bdd->firstname." ".$bdd->lastname;
				}
				$docnotes = $obj->doctornote;
				$Prescriptionid = $obj->prescriptionid;


	    	?>
	    	<button class="accordion"><?php echo $visiton."  (".$dName.")"; ?></button>
			<div class="panel">
			  <b>Doctor Note :         </b> <?php echo " ".$docnotes; ?> <br /><br />
			  <?php if ($obj->nextvisiting != 0) { ?>
			  <b>Next Visit :         </b> <?php echo date("F j, Y",$obj->nextvisiting); ?> <br /><br />


			<?php } ?>
				<b>Priscription :  </b><br />
				<?php
				$queryp = "SELECT * FROM prescriptiondata WHERE `Prescriptionid`= '$Prescriptionid' ORDER BY row_no ASC";
				$resultsp = $mysqli->query($queryp);
				if (mysqli_num_rows($resultsp)>0 and $resultsp){
					while ($obj = $resultsp->fetch_object()) {
						echo $obj->Medicines.' => '.$obj->Quantity.' # '.$obj->Frequency.' @ '.$obj->Consumption_period.' ( '.$obj->Note.' ) '.'<br>';
					}
				}
				?>
			</div>

	    <?php } } ?>





	  </div>
	</div>
</div>

<?php
	
	}
	else{
		?>
		          <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo "Username Error OR Not Registered" ?>
          </div>
    	<?php
	}
}
?>

<script>
var acc = document.getElementsByClassName("accordion");
var i;
for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            panel.style.display = "block";
            
        }
    });
}
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
function addrow() {
    var table = document.getElementById("myTable");
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    cell1.innerHTML = '<input type="text" class="form-control"  name="ptme'+(table.rows.length-1)+'">';
    cell2.innerHTML = '<input type="text" class="form-control"  name="ptqu'+(table.rows.length-1)+'">';
    cell3.innerHTML = '<input type="text" class="form-control"  name="ptfr'+(table.rows.length-1)+'">';
    cell4.innerHTML = '<input type="text" class="form-control"  name="ptcp'+(table.rows.length-1)+'">';
    cell5.innerHTML = '<input type="text" class="form-control"  name="ptnt'+(table.rows.length-1)+'">';
    document.getElementById("numofrows").value = table.rows.length-1;
}
function deleterow(){
	var table = document.getElementById("myTable");
	if (table.rows.length >1 ) {
		table.deleteRow(-1);
	}
	document.getElementById("numofrows").value = table.rows.length-1;
}
function visitclick(){
	if(document.getElementById("nvCheck").checked == true){
		document.getElementById("idinputdays").disabled = false;
	}else{
		document.getElementById("idinputdays").disabled = true;
	}
}

function optionselect(){
	var apidp = document.getElementById("getapid").value;
	window.location.href = "Visitingtime.php?phpapidp=" + apidp;
}

$(function(){
  $('#getapid').on('change', function(){
  	var apidp = document.getElementById("getapid").value;
	window.location.href = "Visitingtime.php?phpapidp=" + apidp;
  })
  })

</script>

<?php include 'docFooter.php'; ?>