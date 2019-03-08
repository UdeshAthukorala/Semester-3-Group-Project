<!DOCTYPE html>
<html>
<head>
<style>
table, td {
    border: 1px solid black;
}
</style>
</head>
<body>

<p>Click the button to add a new row at the first position of the table and then add cells and content.</p>
<form method="post" action="http://www.moraetamils.com">
<table id="myTable">
  <tr>
    <td>Row1 cell1</td>
    <td>Row1 cell2</td>
  </tr>
  <tr>
    <td><input type='text'></input></td>
    <td><input type='text'></input></td>
  </tr>
  <tr>
    <td><input type='text'></input></td>
    <td><input type='text'></input></td>
  </tr>
</table>
<br>


<button onclick="myFunction()">Add</button>
<button onclick="delefun()">Delete</button>
<button type="submit">Submit</button>
</form>
<script>
var counter = 2;
function myFunction() {
	counter++;
    var table = document.getElementById("myTable");
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = '<input type="text" value="counter" requried></input>';
    cell2.innerHTML = "<input type='text' requried></input>";
}
function delefun(){
	var table = document.getElementById("myTable");
    if(table.rows.length>2){
		table.deleteRow(-1);
    }
}
</script>

</body>
</html>
