<!DOCTYPE html>
<?php include "config.php"?>
<html>
<head>
    <title>UPDATE EXISTING</title>
  <!-- <link rel="stylesheet" type="text/css" href="addnewmedicine.css"> -->
</head>
<style type="text/css">
body {
    font-family: Arial, Helvetica, sans-serif;

    margin-left: 420px;
}
form{
    width: 55%;
}
* {
    box-sizing: border-box;
}

/* Add padding to containers */
.container {
    padding: 16px;
    background-color: white;
}

/* Full-width input fields */
input[type=text], input[type=number] {
    width: 100%;
    padding: 15px;
    margin: 5px 0 22px 0;
    display: inline-block;
    border: none;
    background: #f1f1f1;
}

input[type=text]:focus, input[type=number]:focus {
    background-color: #ddd;
    outline: none;
}

/* Overwrite default styles of hr */
hr {
    border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
    background-color: #189074;
    color: white;
    padding: 16px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    opacity: 0.9;
}

.registerbtn:hover {
    opacity: 1;
}

/* Add a blue text color to links */
a {
    color: dodgerblue;
}
  </style>


<body>


    <form action="updateexistingindex.php" method="POST">
      <div class="container">
        <h1>Update Existing Stock</h1>
        <p>Please fill in this form to update existing stock</p>
        <hr>
            <label for="drugcode">Drug Code</label>
            <input type="text"  name="drugcode">

            <label for="drugname">Drug Name</label>
            <input type="text" name="drugname">
            
            <label for="qty">Available Qty(g)</label>
            <input type="number" id="qty" name="qty">

            <label for="batchno">Batch No</label>
            <input type="number" id="batchno" name="batchno">

            <label for="expirydate">Expiry Date</label>
            <input type="Date" id="expirydate" name="expirydate"><br><br>

            <label for="price">Price/Unit</label>
            <input type="number" id="price" name="price">

            <label for="vat">VAT/Unit</label>
            <input type="number" id="vat" name="vat">

            <label for="total">Total/Unit</label>
            <input type="number" id="total" name="total">
        <hr>

        <button type="submit" class="registerbtn" name="submit">Update</button>
      </div>  
      
    </form>
<a href="pharmacyhome.php" id="back">Back</a>





</body>
</html>