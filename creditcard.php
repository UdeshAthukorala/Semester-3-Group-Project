<!DOCTYPE html>
<?php include "config.php"?>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
input[type=text], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=number], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=date], select {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 100%;
    background-color: #008080;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #6195CA;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 30px;

}
</style>
<body>



<div style="padding-top: 20px;" class="container">
	
	<div style="padding-left: 490px;">
		<h3>Pay Invoice</h3>
		<i class="fa fa-cc-mastercard" style="font-size:36px"></i><i class="fa fa-cc-paypal" style="font-size:36px"></i><i class="fa fa-cc-visa" style="font-size:36px"></i>
	</div>
  <form method="POST" action="takepayment.php" >
  	<!-- <i class="fa fa-cc-mastercard" style="font-size:36px"></i><i class="fa fa-cc-paypal" style="font-size:36px"></i> -->
    <br>
    <label for="username">User name</label>
    <input type="text" id="username" name="username" pattern="[A-Za-z0-9_]{1,40}" title="You can use (a-z) / (A-Z) / (0-9) / _ and less than 40 character" required>
    <br><br>
    <label for="presid">Prescription Id</label>
    <input type="number" id="presid" name="presid" pattern="[0-9]" title="You can use (0-9)" required>
    <br><br>
    <label for="today"><b>Date</b></label>
    <input type="date"  id="today" name="today" required min="05-26-2018">
    <br><br>
    <label for="amount">Payment Amount</label>
    <input type="Number" id="amount" name="amount"  required >
	<br><br>
	<label for="nameoncard">Name on card</label>
    <input type="text" id="nameoncard" name="nameoncard" pattern="[A-Za-z]{1,40}" title="You can use (a-z) / (A-Z)  / _ and less than 40 character" required>
	<br><br>
	<label for="cardnumber">Card Number</label>
    <input type="Number" id="cardnumber" name="cardnumber" required >
	<br><br>
	<label for="securitynum">Security Number</label>
    <input type="Number" id="securitynum" name="securitynum" required >
	<br><br>
	<label for="exp">Expiry Date</label>  
    <input type="Date" id="exp" name="exp" required >
	<br><br>
	
  
    <input type="submit" name="submit">
  </form>
</div>

</body>
</html>
