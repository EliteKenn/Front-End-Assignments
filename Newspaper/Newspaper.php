<?php
    $selectRegion = $_GET["regionKey"];
    
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "worldnewspapersdb";
    $dbtable = "wnewspapersdb_table";
    
    $conndb = mysqli_connect($server,$user,$password,$database) or die("no connection");
    
    $SQLselect = "select * from $dbtable where region = '" .$selectRegion ."'";
    $SQLselectII = "select * from $dbtable";
    $resultsII = mysqli_query($conndb,$SQLselectII) or die ("query did not run");
    $results = mysqli_query($conndb,$SQLselect) or die("query did not run");
    
    $numrecs = mysqli_num_rows($results);
    if($numrecs == 0){
        while($recordArray = mysqli_fetch_array($resultsII)){
            $paperTitle = $recordArray[1];
            $webSite = $recordArray[7];
            print "<a href='" . $webSite ."'>".$paperTitle."</a>";
            print "<p></p>";
        }
    }
    else if($numrecs > 0) {
        while($recordArray = mysqli_fetch_array($results)) {
            $paperTitle = $recordArray[1];
            $webSite = $recordArray[7];
            
            print "<a href='" . $webSite ."'>".$paperTitle."</a>";
            print "<p></p>";
        }
    }
    else
        print "No record(s) found";
?>

<!--http://localhost/termproject/termProject.html-->