<?php include ('docHeader.php'); 
include ('sqlphpfunctions.php'); ?>


<?php
$username = $_SESSION['username'];
$query = "SELECT specializationin FROM basicdetaildoctor WHERE username='$username';";
$results = $mysqli->query($query);
if ($results){
	while ($obj = $results->fetch_object()) {
		$splidstr = $obj->specializationin;
		break;
	}
	$splstr = allsplidtospl($splidstr);
	$dsplarray = explode(',', $splstr);
}
?>


<ul class="nav nav-tabs">
	<li class="nav-item">
		<a class="nav-link active show" data-toggle="tab" id="acreate" href="#create">Create An Appointment</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" id="aview" href="#view">View Appointments</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" data-toggle="tab" id="acancel" href="#cancel">Cancel An Appointment</a>
	</li>
</ul>

<div id="myTabContent" class="tab-content">
	<div class="tab-pane fade   active show" id="create">
		<div class="container">
			<hr>
			<div class="center card border-primary mb-3" style="max-width: 30rem;">
				<div class="card-header">Create An Appointment</div>
				<div class="card-body">
					<form action="createappointmentfunc.php" id="category-form" method="post">
						<fieldset>
							
							<div class="form-group">
								<label class="col-form-label" for="inputDefault">An appointment Start time</label>
								<input type="datetime-local"  class="form-control" name="aptimestart" min="<?php echo date('Y-m-d\TH:i');  ?>" id="aptimestart" required>
							</div>

							<div class="row">
								<div class="form-group" style="width: 45%; padding: 0 17px;">
									<label class="col-form-label" for="inputDefault">How long <tagname  style="font-size: 10px;">(in min)</tagname> </label>
									<input type="number" class="form-control" name="timetaking" id="spl1"  min="10" max="240" placeholder="in minutes" required>
								</div>

								<div class="form-group" style="width: 45%; padding: 0 17px;">
									<label class="col-form-label" for="inputDefault">Max No of Patients</label>
									<input type="number"  class="form-control" placeholder="Max No of Patients" name="maxpatient" min="1" max="100" required>
								</div>
							</div>

							<div class="form-group">
								<label class="col-form-label" for="inputDefault">Specialization in</label>
								<div id="app" >
									<div  class="custom-control custom-checkbox" > 
										<input type="checkbox" class="custom-control-input" id="checkbox" value="<?php echo($splstr); ?>" name="specialization" v-model="checked">

										<label for="checkbox" class="custom-control-label">Tick For Select all of yours specializations <tagname style="text-transform: uppercase;">( {{ checked }} ) </tagname></label>

									</div>
									<v-select multiple v-model="selected" id="spl" placeholder="Select here" :disabled="checked" :options="options" ></v-select>
									<input :disabled="checked" required name="specialization" :value="selected" style="width: 0; height: 0; opacity: 0; top: -20px; left: 50px; position: relative;" >
								</div>
							</div>

							<button type="sumit" name="sumit" value="sumit" title="Fill All Feilds" class="btn btn-success btn-lg" style="font-size:24px; texregchr.phpt-align:right;">Create</button>

						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>


	<div class="tab-pane fade" id="view">
		<div class="container" style="max-width: 40rem; margin: 0;">
			<hr>
			<?php
				$now = time();
				$query = "SELECT * FROM `docappointment` WHERE `username` = '$username' and `appointmentto` > '$now' ORDER BY appointmentfrom ASC";
				$results = $mysqli->query($query);
				if ($results){
					$count = 0;
  					while ($obj = $results->fetch_object()) {
    					$apid = $obj->appointmentid;
    					$apfrom = $obj->appointmentfrom;
    					$apto = $obj->appointmentto;
    					$maxpet = $obj->maxnoofpatient;
    					$regpet = $obj->noofregisteredpatients;
    					$apsplid = $obj->appointmentspecialization;
    					$createdon = $obj->createdon;
    					$percentage = $regpet*100 / $maxpet;
    					$creat = date("F j, Y - g:i A", $createdon);
    					$date = date("F j, Y", $apfrom);
    					$stime = date("g:i A", $apfrom);
    					$etime = date("g:i A", $apto);
    					$week = date("l", $apfrom);
    					$apspl = str_replace(',',',&nbsp&nbsp',allsplidtospl($apsplid));   ?>

					
						<div class="card">
							<div class="card-body">
								<h3 class="card-title"><?php echo $date; ?><tagname style="font-size: 16px;"><?php echo ' &nbsp&nbsp('.$week.' )'; ?></tagname></h3>
								<h5 class="card-subtitle mb-2 text-muted"><?php echo $stime.' - '.$etime; ?></h5>
								<h5 class="card-text"><?php echo 'Appointment Id : '.$apid; ?></h5><p></p>
								<h5>Specialization in :</h5>
								<p class="card-text"><?php echo $apspl; ?></p>
								<h5 class="card-text"><?php echo 'Registered Patients : '.$regpet.' / '.$maxpet; ?></h5>
								<div class="progress">
									<div class="progress-bar progress-bar-striped bg-info progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="<?php echo 'width: '.$percentage.'%'; ?>"></div>
								</div>
								<p></p>
								<a  class="card-link" style="top: 40px;"><?php echo 'Created on '.$creat; ?></a>
								<?php if($count == 0){ ?> <a href="#" style="font-size: 24px;" class="card-link">Start Visiting</a> <?php } ?>
							</div>
						</div>
						<hr>
    					<?php $count++; }  }  ?>
		</div>
	</div>

	<div class="tab-pane fade" id="cancel">
		<div class="container" style="max-width: 40rem; margin: 0;">
			<hr>
			<?php
				$now = time();
				$query = "SELECT * FROM `docappointment` WHERE `username` = '$username' and `appointmentto` > '$now' ORDER BY appointmentfrom ASC";
				$results = $mysqli->query($query);
				if ($results){
  					while ($obj = $results->fetch_object()) {
    					$apid = $obj->appointmentid;
    					$apfrom = $obj->appointmentfrom;
    					$apto = $obj->appointmentto;
    					$maxpet = $obj->maxnoofpatient;
    					$regpet = $obj->noofregisteredpatients;
    					$apsplid = $obj->appointmentspecialization;
    					$createdon = $obj->createdon;
    					$percentage = $regpet*100 / $maxpet;
    					$creat = date("F j, Y - g:i A", $createdon);
    					$date = date("F j, Y", $apfrom);
    					$stime = date("g:i A", $apfrom);
    					$etime = date("g:i A", $apto);
    					$week = date("l", $apfrom);			  ?>

					
						<div class="card border-danger">
							<div class="card-body">
								<h3 class="card-title"><?php echo $date; ?><tagname style="font-size: 16px;"><?php echo ' &nbsp&nbsp('.$week.' )'; ?></tagname></h3>
								<h5 class="card-subtitle mb-2 text-muted"><?php echo $stime.' - '.$etime; ?></h5>
								<h5 class="card-text"><?php echo 'Appointment Id : '.$apid; ?></h5><p></p>
								<!-- -->
								<h5 class="card-text"><?php echo 'Registered Patients : '.$regpet.' / '.$maxpet; ?></h5>
								<div class="progress">
									<div class="progress-bar progress-bar-striped bg-danger progress-bar-animated" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="<?php echo 'width: '.$percentage.'%'; ?>"></div>
								</div>
								<p></p>
								<a  class="card-link" style="top: 40px;"><?php echo 'Created on '.$creat; ?></a>
								<form action="deleteapoint.php" method="post" onsubmit="return confirm('Delete the selected entry?')" ><fieldset>
									<input name="entryid" value="<?php echo $apid ?>" hidden >
								<button  id="submit" name="submit" class="btn btn-danger dletebtn" style="font-size: 30px; border: 0;"><i class="material-icons" style="font-size:72px">delete</i><br><span class="badge badge-pill badge-<?php echo $regpet==0?'info':'danger'; $sp = $regpet==1?' has':'s have' ?>"><?php echo $regpet==0?'No one has registered yet. You can also Cancel it':'Warning! '.$regpet.' patient'.$sp.' already registered'; ?></span></button></fieldset></form>
								<style>
									.dletebtn{
										height: 100%; width: 100%; background-color: rgba(255,0,17, 0.01); opacity: 0; top: 0; right: 0; left:0; bottom: 0; position: absolute;
									}
									.dletebtn:hover { 
										background-color: rgba(255,0,17, .2);
    									opacity: 0.85;
									}
								</style>
							</div>
						</div>
						<hr>
    					<?php }  }  ?>
		</div>
	</div>

</div>

<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/ngAlertify.js"></script>


<!-- gggggggggggggggggggggggggggg -->
  <script src='assets/js/vue.js'></script>
  <script src='assets/js/vue-select.js'></script>
<script type="text/javascript">
	Vue.component('v-select', VueSelect.VueSelect)
	var obj = <?php echo json_encode($dsplarray); ?>;
	new Vue({
		el: '#app',
		data: {
			selected: [],
			options: obj,
			checked: false
		}
	})
</script>
<!-- gggggggggggggggggggggggggggg -->



<?php include 'docFooter.php'; ?>

