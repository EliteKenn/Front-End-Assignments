<?php

//get the passing argument -> inputSearch

$searchText = $_GET["searchKey"];

//Connect to the database

$server = "localhost";
$user = "root";
$password = "";
$database ="us_presidentsdb";

$dbtable = "us_presidentsdb_table";

//Create connection
$conndb = mysqli_connect($server,$user,$password,$database) or die ("no connection");

//Create SQL select command to filter out records that match $searchText
$SQLselect = "select * from $dbtable where match(name,state_birth,dob,dod,religion,party,term_office,age_inaug,age_death,first_lady,vp,picture)
        against ('".$searchText. "'in natural language mode)";
        
        //runnig the above command
        $results = mysqli_query($conndb,$SQLselect) or die ("query did not run");
        
        #number of matched records
        $numrecs = mysqli_num_rows($results);
        
        if($numrecs > 0){
            //start sending select elemtnt ot html
            print "<select id='presidentList' onchange='showinfo();' size='7'>";
            
            while($recordArray = mysqli_fetch_array($results)){
                
                //extract table fields' values
                $fieldName = $recordArray[1];
                $fieldParty = $recordArray[6];
                $fieldPicture =$recordArray[12];
                $fieldValue = $fieldParty. ",".$fieldPicture;
                
                print "<option value='" . $fieldValue ."'>".$fieldName."</option>";
                
            }
            print "</select>";
        }

else print "No record(s) found";
?>