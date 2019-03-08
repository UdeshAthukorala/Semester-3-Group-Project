<!DOCTYPE html>
<?php include "config.php"?>
<html>

<head>
        <link rel="stylesheet" type="text/css" href="bootstrap.min.css">

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
;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
<body>


<div class="container">
  <form method="POST" action="takepayment.php" >
    <label for="regnum">Registration Number</label>
    <input type="text" id="regnum" name="regnum" placeholder="Enter reg_number..">
	<br><br>
    <label for="date">Date</label>
    <input type="date" id="date" name="date" placeholder="date...">
	<br><br>
	<label for="price">Total Price</label>
    <input type="number" id="price" name="price" placeholder="Price...">
	<br><br>

  
    <input type="submit" name="submit">
  </form>
</div>

</body>
</html>
