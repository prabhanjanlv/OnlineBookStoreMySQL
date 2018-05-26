<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="menu.css">					<!-- General Style content for site -->
<link rel="stylesheet" href="headermenu.css">			<!-- Header Menu and styling -->
<link rel="stylesheet" href="tablestyle.css">			<!-- Table Styling CSS -->

<style>
#container > div					<!-- Container Style code for arranging contents -->
{
    display: inline-block;
    border: solid 1px #000;
}
#container
{
    border: solid 1px #ff0000;
    text-align: center;
    margin: 0px auto;
    width: 40%;
}  
</style>

</head>
<body>
<div stlye="font margin: 0; padding: 0; color: #7199e1;" style="font: italic 2em/1em &quot;Times New Roman&quot;, &quot;MS Serif&quot;, &quot;New York&quot;, serif;
    margin: 0;padding: 0;color: #212e41;border-top: solid #ffffff medium;border-bottom: dotted #ffffff thin;width: 235px;margin-left: auto;margin-right: auto;
"> Online Bookstore </div>       <!-- site Title -->


<section id="nav-test" style = "margin-bottom: -180px;">			<!-- Menu Content -->
  <div id="nav-container">
    <ul>
      <ul>
      <li class="nav-li active-nav"><a href="bookstore.php">Books</a></li>
      <li class="nav-li"><a href="customer.php">Customers</a></li>
      <li class="nav-li"><a href="employee.php">Employees</a></li>
      <li class="nav-li"><a href="order.php">Orders</a></li>
	  <li class="nav-li"><a href="order_detail.php">Order Details</a></li>
	  <li class="nav-li"><a href="shipper.php">Shippers</a></li>
	  <li class="nav-li"><a href="subject.php">Subject</a></li>
	  <li class="nav-li"><a href="supplier.php">Suppliers</a></li>
    </ul>
    <div id="line"></div>
  </div>
</section>

<div style = "background-color: #252541;color: white;width: 285px;text-align: center;margin-left: 345px;margin-bottom: 78px;"> Please Enter SQL Query here </div> <!-- Text -->

<div style="margin-top: -170px;margin-left: 675px;">							<!-- Input Query box -->
<form action="#" method="post">
  <input type="text" id="text" name="inputText" style="width: 250px; height: 150px;"/>
 <input type="submit" name="SubmitButton"/>
</div>
 
<div id="container">		<!-- Container to arrange tables (Input and Output) -->
<?php

$servername = "<insert servername for db here>";
$username = "<insert username for db here>";
$password = "<insert password for db here>";
$dbname = "<insert db name here>";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);  //Database connection and attributes

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);	//Check if there is an error while conneccting to the database
} 
$sql = "SELECT * FROM db_shipper" ;		//Query to be executed
$result = $conn->query($sql);		//Result from the connected Database
$all_property = array();  //declare an array for saving property

//showing property

echo '<div style="float: left;margin-left: -430px;margin-top: 120px;">';				//Print tables from result
echo '<div style = "margin-bottom: -30px;background-color: #252541;color: white;">Shipper Table</div>';	//Style content from table
echo '<table>
        <tr class="data-heading">';  //initialize table tag
while ($property = mysqli_fetch_field($result)) {
    echo '<td>' . $property->name . '</td>';  //get field name for header
    array_push($all_property, $property->name);  //save those to array
}
echo '</tr>'; //end tr tag

//showing all data
while ($row = mysqli_fetch_array($result)) {	//fetch the records from the table in a while loop
    echo "<tr>";
    foreach ($all_property as $item) {	//Access each item
        echo '<td>' . $row[$item] . '</td>'; //get items using property value
    }
    echo '</tr>';
}
echo "</table>";
echo "</div>";

error_reporting(~E_ALL);		//Handles All the errors in php

if(isset($_POST['inputText'])) 	//Gets input from text box
$sql1 = $_POST["inputText"]; 	//Stores in a local variable


$drp = 'drop';
$pos  = strripos($sql1, $drp);	//check if the query contains drop


if($pos > -1){
	echo "Drop Command Not Allowed";			//print if error
}

	
else{
$result1 = $conn->query($sql1);	//If not error then execute a query
if (!mysqli_query($conn,$result1))
  {
	echo'<div style = "float: right;margin-top:-420px;">';
  echo("Error:" . mysqli_error($conn));
  echo'</div>';
  }
$all_property = array();  //declare an array for saving  

//showing property
echo '<div style="float: right; margin-right: -430px; margin-top: 120px;">';		//Styling for the table
echo '<div style = "margin-bottom: -30px;background-color: #252541;color: white;">Result Table</div>';
echo '<table>
        <tr class="data-heading">';  //initialize table tag
while ($property = mysqli_fetch_field($result1)) {
    echo '<td>' . $property->name . '</td>';  //get field name for header
    array_push($all_property, $property->name);  //save those to array
}
echo '</tr>'; //end tr tag

//showing all data
while ($row = mysqli_fetch_array($result1)) {
    echo "<tr>";
    foreach ($all_property as $item) {
        echo '<td>' . $row[$item] . '</td>'; //get items using property value
    }
    echo '</tr>';
}
echo "</table>";
echo"</div>";
}	
?>
</div>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script> <!-- Execute the javascript for the page styling -->

</body>
</html>