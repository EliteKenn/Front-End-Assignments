<?php

//getting selected instructor
$instructor = $_GET["instrKey"];

$file = fopen("cst_faculty.csv","r");

$pointer = 1;

$foundmatch = false;
$courses = "";

while(($row = fgetcsv($file,0,",")) == TRUE){
    
    if($pointer >1){
        
        if(strcasecmp($row[0],$instructor) == 0){
            $foundmatch = true;
            
            $rowlength = count($row);
            
            for($index= 2;$index < rowlength;$index++){
                
                if($index == $rowlength-1) $courses.=$row[$index];
                else
                $courses.=$row[$index].",";
            }
            print $courses;
            break;
        }
        else
        $pointer++;
    }
    if($foundmatch == false)
    print "Faculty not found";
}
?>