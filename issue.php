<!DOCTYPE html>
<?php include "config.php"?>
<html>
<head>
	
    <link rel="stylesheet" type="text/css" href="flatly.css">
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
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="pharmacyhome.php">PHARMACY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="pharmacyhome.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" href="issue.php">Issue</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="inventorycondition.php">Inventory Check</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="addnewmedicine.php">New Stock</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="updateexisting.php">Stock Update</a>
      </li>
      
        <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
    
  </div>
</nav>
<h3></h3>

<div class="container">
  <form method="POST" action="checktable.php" >
    <label for="username">Patient User Name</label>
    <input type="text" id="username" name="username" placeholder="Enter User name..">
	<br><br>
    
  
    <input type="submit" name="submit">
  </form>
</div>

</body>
</html>
