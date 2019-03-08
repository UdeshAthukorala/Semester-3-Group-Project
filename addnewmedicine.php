<!DOCTYPE html>
<html>
<?php include "config.php"?>
<head>
	<title>Add stock</title>
	<link rel="stylesheet" type="text/css" href="flatly.css">
</head>
<body>

	<div  style="width: 450px;padding-left: 270px">
		<h2>Stock Update</h2>
		<form method="POST" action="addnewmedicineindex.php">
			<table class="table table-hover">
			  <thead>
			    <tr>
			      <th scope="col">Drug Name</th>
			      <th scope="col">Drug Code</th>
			      <th scope="col">Mfr Name</th>
			      <th scope="col">Maximum Store </th>
			      <th scope="col"> Qty</th>
			      <th scope="col"> Batch No</th>
			      <th scope="col">Exp Date </th>
			      <th scope="col"> Price</th>
			      <th scope="col">Vat </th>
			      <th scope="col"> Total</th>
			    </tr>
			  </thead>
			  <tbody>  
			    
			    <tr class="table-success">
			     	    <td  style="width: 80px;"><input style="width: 80px;" type="text" name="drugname1" pattern="[A-Za-z]{1,40}" title="You can use (a-z) / (A-Z) / _ and less than 40 character" required ></td>
			            <td  style="width: 80px;"><input style="width: 80px;" type="text" name="drugcode1" ></td>
			            <td style="width: 100px;"><input style="width: 100px;" type="text" name="mfrname1" pattern="[A-Za-z]{1,40}" title="You can use (a-z) / (A-Z) / _ and less than 40 character" required ></td>
			            <td  style="width: 80px;"><input style="width: 80px;" type="number" name="dosage1" ></td>
			            <td  style="width: 80px;"><input style="width: 80px;" type="number" name="qty1" ></td>
			            <td  style="width: 80px;"><input style="width: 80px;" type="text" name="batchno1" ></td>
			            <td  style="width: 80px;"><input style="width: 80px;" type="Date" name="expdate1" ></td>
			            <td  style="width: 80px;"><input style="width: 80px;" type="number" name="price1" ></td>
			            <td  style="width: 80px;"><input style="width: 80px;" type="number" name="vat1" ></td>
			            <td><input style="width: 80px;" type="number" name="total1" ></td>
			    </tr>

			    <tr class="table-success">
			      		<td  style="width: 80px;"><input style="width: 80px;" type="text" name="drugname2" pattern="[A-Za-z]{1,40}" title="You can use (a-z) / (A-Z) / _ and less than 40 character"  ></td>
			            <td><input style="width: 80px;" type="text" name="drugcode2"></td>
			            <td><input style="width: 100px;" type="text" name="mfrname2" pattern="[A-Za-z]{1,40}" title="You can use (a-z) / (A-Z) / _ and less than 40 character"  ></td>
			            <td><input style="width: 80px;" type="number" name="dosage2"></td>
			            <td><input style="width: 80px;" type="number" name="qty2"></td>
			            <td><input style="width: 80px;" type="text" name="batchno2"></td>
			            <td><input style="width: 80px;" type="Date" name="expdate2"></td>
			            <td><input style="width: 80px;" type="number" name="price2"></td>
			            <td><input style="width: 80px;" type="number" name="vat2"></td>
			            <td><input  style="width: 80px;" type="number" name="total2"></td>
			    </tr>

			    <tr class="table-success">
			      		<td><input  style="width: 80px;"type="text" name="drugname3" pattern="[A-Za-z]{1,40}" title="You can use (a-z) / (A-Z) / _ and less than 40 character"  ></td>
			            <td><input  style="width: 80px;"type="text" name="drugcode3"></td>
			            <td><input  style="width: 100px;"type="text" name="mfrname3" pattern="[A-Za-z]{1,40}" title="You can use (a-z) / (A-Z) / _ and less than 40 character"  ></td>
			            <td><input  style="width: 80px;"type="number" name="dosage3"></td>
			            <td><input  style="width: 80px;"type="number" name="qty3"></td>
			            <td><input  style="width: 80px;"type="text" name="batchno3"></td>
			            <td><input  style="width: 80px;"type="Date" name="expdate3"></td>
			            <td><input  style="width: 80px;"type="number" name="price3"></td>
			            <td><input  style="width: 80px;"type="number" name="vat3"></td>
			            <td><input t style="width: 80px;" type="number" name="total3"></td>
			    </tr>

			    <tr class="table-success">
			      		<td><input style="width: 80px;" type="text" name="drugname4" pattern="[A-Za-z]{1,40}" title="You can use (a-z) / (A-Z) / _ and less than 40 character"  ></td>
			            <td><input style="width: 80px;" type="text" name="drugcode4"></td>
			            <td><input style="width: 100px;" type="text" name="mfrname4" pattern="[A-Za-z]{1,40}" title="You can use (a-z) / (A-Z) / _ and less than 40 character"  ></td>
			            <td><input style="width: 80px;" type="number" name="dosage4"></td>
			            <td><input style="width: 80px;" type="number" name="qty4"></td>
			            <td><input style="width: 80px;" type="text" name="batchno4"></td>
			            <td><input style="width: 80px;" type="Date" name="expdate4"></td>
			            <td><input style="width: 80px;" type="number" name="price4"></td>
			            <td><input style="width: 80px;" type="number" name="vat4"></td>
			            <td><input style="width: 80px;" type="number" name="total4"></td>
			    </tr>

			    <tr class="table-success">
			      	    <td><input style="width: 80px;" type="text" name="drugname5" pattern="[A-Za-z]{1,40}" title="You can use (a-z) / (A-Z) / _ and less than 40 character"  ></td>
			            <td><input style="width: 80px;" type="text" name="drugcode5"></td>
			            <td><input style="width: 100px;" type="text" name="mfrname5" pattern="[A-Za-z]{1,40}" title="You can use (a-z) / (A-Z) / _ and less than 40 character"  ></td>
			            <td><input style="width: 80px;" type="number" name="dosage5"></td>
			            <td><input style="width: 80px;" type="number" name="qty5"></td>
			            <td><input style="width: 80px;" type="text" name="batchno5"></td>
			            <td><input style="width: 80px;" type="Date" name="expdate5"></td>
			            <td><input style="width: 80px;" type="number" name="price5"></td>
			            <td><input style="width: 80px;" type="number" name="vat5"></td>
			            <td><input style="width: 80px;" type="number" name="total5"></td>
			    </tr>			    
			  </tbody>
		</table> 
		<input  type="submit" name="submit"><br>
        <a href="pharmacyhome.php" >back</a>
		</form>
	</div>

</body>
</html>