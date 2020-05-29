<?php

$searchText = $_GET["searchKey"];

//connecting to the database, need to setup 4 parameters


$server = "localhost";
$user = "root";
$password = "";
$database = "cuny_schools";

$dbtable = "cuny_schools_table";

$conndb = mysqli_connect($server,$user,$password,$database) or die ("no connection");

$SQLselect = "select * from $dbtable where match(`College Type`,`College`,`Website`,`Address`,`City`,`State`,`Zip`,`Latitude`,`Longitude`,`Phone`) against ('".$searchText . "' in natural language mode)";

//running above SQL command
$results = mysqli_query($conndb,$SQLselect) or die ("query did not run");

//number of matched records
$numrecs = mysqli_num_rows($results);  

if($numrecs > 0){
    //start sending select element to HTML
    print "<select id='cunyList' onchange()='showinfo()'>";
    print "<option value='' >Make a selection</option>";
    
    //loop through the records - all contained in the variable $results
    while($recordArray = mysqli_fetch_array($results)){
        //extracting the table fields' values
        $fieldType = $recordArray[0];
        $fieldName = $recordArray[1];
        $fieldSite = $recordArray[2];
        $fieldAddress = $recordArray[3];
        $fieldCity = $recordArray[4];
        $fieldState = $recordArray[5];
        $fieldZip = $recordArray[6];
        $fieldLongitude = $recordArray[7];
        $fieldLat = $recordArray[8];
        $fieldPhone = $recordArray[9];
        
        //sending option back to HTML
        
        print "<option value='".$fieldType."'>".$fieldName."</option>";
    
    }
    //close select to HTML
    print "</select>";
    
}
else
print "No record(s) found";
?>
<!--http://localhost/CST3519WebAppHW5/HW5.html-->