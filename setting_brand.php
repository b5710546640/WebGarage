<?php
    
    session_start();
    $brand_name= $_POST['car_brand'];
    
    if($brand_name) {
        $connect = mysql_connect("localhost","root","") or die("Couldn't connect to the DB!!");
        mysql_select_db("parking_registration") or die("Couldn't find database");
         
        $sql = "INSERT INTO brand (name) VALUES ('$brand_name')";

        $query = mysql_query($sql);
        header("Location:setting.php");
    }
    else{
//        header("Location:setting.php");
        die("Please enter the new brand!");
    }

?>