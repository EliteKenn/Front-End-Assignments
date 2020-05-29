<?php
    $selectAnimal = $_GET["animalKey"];
    
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "bronx_zoodb";
    $dbtable = "bronx_zoodb_table";
    
    $conndb = mysqli_connect($server,$user,$password,$database) or die("no connection");
    
    $SQLselect = "select * from $dbtable where animal = '" .$selectAnimal ."'";
    
    
    $results = mysqli_query($conndb,$SQLselect) or die("query didn't run");
    
    $numrecs = mysqli_num_rows($results);
    if($numrecs > 0) {
        while($recordArray = mysqli_fetch_array($results)) {
            $location = $recordArray[2];
            $website = $recordArray[3];
            
            print "Location: ";
            print "<a href='" . $website ."'>".$location."</a>";
        }
    }
?>