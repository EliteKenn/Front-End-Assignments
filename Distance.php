<?php
if(isset($_POST['submit'])){
foreach ($_POST['Cities'] as $select)
     {
        if($select == "Dublin"){
            print "Distance from New York to Dublin is 3176 miles";
        }
        if($select == "Paris"){
            print "Distance from New York to Paris is 3625 miles";
        }
        if($select == "London"){
            print "Distance from New York to London is 3459 miles";
        }
        if($select == "Dhaka"){
            print "Distance from New York to Dhaka is 6883 miles";
        }
       
     }
}
?>