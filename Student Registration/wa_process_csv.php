<?php

//Read the inputs

$fName = $_GET["fnameTxtBx"];
$lName = $_GET["lnameTxtBx"];
$inputID = $_GET["idTxtBx"];

//opening the csv file for reading using function fOpen()

$file = fopen("students.csv", "r");

//loop thru csv, reading each line
//using php method fgetcsv(file,linesize,delimiter).

$foundmatch = false;

//variable to skip the first line of csv
$reading = 1;

while(($row = fgetcsv($file,0,",")) != FALSE){
    
    if($reading > 1){
        
        $fNameInFile = $row[0];
        $lNameInFile = $row[1];
        $idInFile = $row[2];
        
        if(strcasecmp($fName,$fNameInFile) == 0 &&
            strcasecmp($lName,$lNameInFile) == 0 &&
            strcasecmp($inputID,$idInFile) == 0)
        {
            $foundmatch = true;
            print "Congratz " .$fName . " " .$lName ." is in our records now";
            break;
        }  
    }
    else{
        $reading++;
    }
    
}
//http://localhost/CST3519WebAppHW2/HW2.html
if($foundmatch == false) print "Name and ID not found";

?>