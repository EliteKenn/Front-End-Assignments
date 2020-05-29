<?php
   
   //connecting to the database
   //need to setup for parameters = server which is localhost. username for databsae, password for database, and of course the database
   
   $server = "localhost";
   $user = "root";
   $password = "";
   $database = "nydistcapital";
   
   
   //Get the table in the database
   $dbTable = "nydistcapital_table";
   
   //creating a connection. //or die is very similar to Exceptions in Java
   $conndb = mysqli_connect($server,$user,$password,$database) or die ("No connection");
   
   
   //creating a String variable to select all records in the database table
   $SQLselect = "select * from ".$dbTable;
   
   //running the above SQL
   $results = mysqli_query($conndb, $SQLselect) or die("Invalid query");
   
   //putting together the select element
   print "<select id='capitalList' onchange='getdistance()'>";
   print "<option value=' '>Select a capital</option>";
   
   //loop thru all records contained the in the variable result(like the ResultSet in java)
   while($recordArray = mysqli_fetch_array($results)){
      
      $country = $recordArray[0];
      $capital = $recordArray[1];
      $miles = $recordArray[2];
      $kilometers = $recordArray[3];
      $distance = $miles . ",".$kilometers;
      
      print "<option value='".$distance."'>".$capital. "," . $country."</option>";
      
   }
   
   //send back to html the closing of select element
   
   print"</select>"
?>