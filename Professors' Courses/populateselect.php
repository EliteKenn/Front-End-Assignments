<?php
    
    $file = fopen("cst_faculty.csv","r");
    
    //initialize pointer for the while loop
    
    $pointer = 1;
    
    //string variable for courses
    $courses = "";
    
    //start sending select element to client
    print "<select id='facultyList' onchange='showcourses()'>";
    print "<option value=''>Select an Instructor</option>";
    
    //loop through the csv file using fgetcsv() which reads the CSV lines
    //creating an array for each line($row = fgetcsv() automatically does it for us)
    
    while(($row = fgetcsv($file,0,',')) != FALSE){
        //array length
        if($pointer > 1){
            //create a variable that holds the length of the row. count() function
        $rowlength = count($row);
        
        for($index = 2;$index<$rowlength;$index++){
            
            //it is the last element of array element
            if($index == $rowlength-1){
                //If we're at the last element, just print the element with no comma after, otherwise print a comma with
                $courses .= $row[$index];
            }else
                $courses .= $row[$index] .", ";
        }
        //ready to send to client option
         $instructor = $row[0];
            print "<option value='".$courses ."'> ".$instructor ."</option>";
        }
        else
            $pointer = 2;
            $courses = "";
    }
    print"</select>"

?>

<!--http://localhost/wa_ajax_query/wa_ajax.html-->