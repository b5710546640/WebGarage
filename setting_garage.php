<?php
    
    session_start();
    $name = $_POST['name_garage'];
    $capacity = $_POST['capacity_garage'];
    
    if($name && $capacity) {
        $connect = mysql_connect("localhost","root","") or die("Couldn't connect to the DB!!");
        mysql_select_db("parking_registration") or die("Couldn't find database");
         
        $sql = "INSERT INTO garage (garage_name, capacity , available_slot) VALUES ('$name', '$capacity' , '$capacity')";

        $query = mysql_query($sql);
    }
    else{
        die("Please enter the name garage and capacity!S");
    }

?>