<?php
//get the passing variable

$searchText = $_GET["searchKey"];

//connect to the server
//need to setup 4 parameters

$server = "localhost";
$user = "root";
$password = "";
$database = "cuny_schools";
$dbtable = "cuny_schools_table";

//create connection

$connection = mysqli_connect($server,$user,$password,$database) or die("Server not found");

$SQLselect = "select * from $dbtable where match(collegetype,college,website,address,city,state,zipcode,latitude,longitude,phone)
against('".$searchText."' in boolean mode)";

//run SQL query
$results = mysqli_query($connection, $SQLselect) or die ("query did not run");

//number of matched record(s)
$numrecs = mysqli_num_rows($results);

if($numrecs > 0){
    //send table elements
    print "<table border='1'>";
    print "<tr><th colspan='11'> Search Result - CUNY Colleges</th></tr>";
    print "<tr><th>ID</th><th>College
Type</th><th>College</th><th>Website</th><th>Address</th><th>City</th><th>".
 "State</th><th>Zip Code</th><th>Latitude</th><th>Longitude</th><th>Phone</th></tr>";
 
//loop through the matched record(s)
while($recordArray = mysqli_fetch_array($results)){
    //extracting fields' values
    $ID = $recordArray[0];
    $collegetype = $recordArray[1];
    $collegeName = $recordArray[2];
    $website = $recordArray[3];
    $address = $recordArray[4];
    $city = $recordArray[5];
    $state = $recordArray[6];
    $zipcode = $recordArray[7];
    $latitude = $recordArray[8];
    $longitude = $recordArray[9];
    $phone = $recordArray[10];
    
    print "<tr><td>".$ID."</td><td>".$collegetype."</td><td id='clickcollege'
onclick='showmap();'>".$collegeName."</td>".
 "<td><a href='".$website."'>".$website."</a></td><td>".$address.
 "</td><td>".$city."</td><td>".$state."</td><td>".
 $zipcode . "</td><td id='clat'>".$latitude."</td><td id='clongi'>".$longitude."</td><td>".
$phone."</td></tr>";
} //end of while
 //send the closing of the table
 print "</table>";
 }
 else print "No record(s) found";
?>

<!--http://localhost/HW10/cuny_colleges_map.html -->