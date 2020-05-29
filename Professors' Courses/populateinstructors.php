<?php


$file = fopen("cst_faculty.csv","r");

//start sending HTML select element to client
print "<select id='facultyList' onchange='getcourses();'>";
 print "<option value=''>Select an Instructor</option>";

 $reading = 1; //used for skipping first line (header line)

 //loop through the file
 while (($row = fgetcsv($file,0,",")) != FALSE)
 {
 //skipping first line
 if ($reading > 1)
 {
 $instructor = $row[0];
 print "<option value='". $instructor ."'>".$instructor."</option>";
 }
 $reading++;
 }//end of loop

 print"</select>";