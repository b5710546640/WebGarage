<?php
    
    session_start();
    $brand_name= $_POST['car_brand'];
    
    if($brand_name) {
        $connect = mysql_connect("localhost","root","") or die("Couldn't connect to the DB!!");
        mysql_select_db("parking_registration") or die("Couldn't find database");
        
        $sql_check_brand = mysql_query("SELECT COUNT(name) FROM brand WHERE name IN ('$brand_name')");
        $check_brand = mysql_result($sql_check_brand,0);
        
        if($check_brand == 0){
            $sql = "INSERT INTO brand (name) VALUES ('$brand_name')";

            $query = mysql_query($sql);
            echo "new brand";
        }else{
            $_SESSION["report_brand_fail"]= "Have ".$brand_name. " already!";
        }
        header("Location:setting.php");
    }
    else{
//        header("Location:setting.php");
        die("Please enter the new brand!");
    }

?>