      </div>
      <div class="col-md-1">
        
      </div>
    </div>
  </div>
  
  <script src="assets\js\jquery-3.3.1.js" ></script>
<script src="assets\js\popper.min.js" ></script>
<script src="assets\js\bootstrap.min.js"></script>

<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->

  
<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
<script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/ngAlertify.js"></script>

<?php if (strpos($_SESSION['alertmessage'], 'Success') !== false): ?>
<script>
	alertify.logPosition("bottom right");
	alertify.success(<?php echo json_encode($_SESSION['alertmessage']); ?>);
</script>
<?php 
$_SESSION['alertmessage'] = '';
elseif (strpos($_SESSION['alertmessage'], 'Error') !== false): ?>
<script>
	alertify.logPosition("bottom right");
	alertify.error(<?php echo json_encode($_SESSION['alertmessage']); ?>);
</script>
<?php 
$_SESSION['alertmessage'] = '';
elseif (strpos($_SESSION['alertmessage'], 'deleted') !== false): ?>
<script>
	alertify.logPosition("bottom right");
	alertify.error(<?php echo json_encode($_SESSION['alertmessage']); ?>);
</script>
<?php 
$_SESSION['alertmessage'] = '';
endif; ?>



</body>
</html>
