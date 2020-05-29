<?php

$searchText = $_GET["searchKey"];

//connecting to the database, need to setup 4 parameters


$server = "localhost";
$user = "root";
$password = "";
$database = "programmer_pioneersdb";

$dbtable = "pioneers_table";

$conndb = mysqli_connect($server,$user,$password,$database) or die ("no connection");

$SQLselect = "select * from $dbtable where match(name,language,bio) against ('".$searchText . "' in natural language mode)";

//running above SQL command
$results = mysqli_query($conndb,$SQLselect) or die ("query did not run");

//number of matched records
$numrecs = mysqli_num_rows($results);  

if($numrecs > 0){
    //start sending select element to HTML
    print "<select id='scientistList' onchange()='showinfo()'>";
    print "<option value='' >Make a selection</option>";
    
    //loop through the records - all contained in the variable $results
    while($recordArray = mysqli_fetch_array($results)){
        //extracting the table fields' values
        $fieldName = $recordArray[0];
        $fieldLang = $recordArray[2];
        $fieldBio = $recordArray[3];
        
        //sending option back to HTML
        
        print "<option value='".$fieldBio."'>".$fieldName.", ".$fieldLang."</option>";
    
    }
    //close select to HTML
    print "</select>";
    
}
else
print "No record(s) found";
?>

<!--http://localhost/programmer_pioneers/programmer_pioneers.html-->