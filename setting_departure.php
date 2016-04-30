        <?php
          session_start();
    $license_leave = $_POST['lc_leave_number'];

    if($license_leave ){
        $connect = mysql_connect("localhost","root","") or die("Couldn't connect to the DB!!");
        mysql_select_db("parking_registration") or die("Couldn't find database");
        
        $carid = mysql_query("SELECT car_id FROM car WHERE license = '$license_leave' ");
        $carid_result =  mysql_result($carid,0);
        
        $slotid = mysql_query("SELECT slot_id FROM parking_card WHERE car_id = '$carid_result' ");
        $slotid_result =  mysql_result($slotid,0);
        
        $sql_update_status = mysql_query("UPDATE parking_slot SET status = 'Available' WHERE slot_id = '$slotid_result'");
        $sql_garage_id = mysql_query("SELECT garage_id FROM parking_slot WHERE slot_id = '$slotid_result'");
        $garage_id = mysql_result($sql_garage_id,0);
        $sql_update_available_slot = mysql_query("UPDATE garage SET available_slot = available_slot+1 WHERE garage_id = '$garage_id'" );
        $sql_update_departure = mysql_query("UPDATE parking_card SET departure_status = 'Depart' WHERE slot_id = '$slotid_result'");
         header("Location: car_regis.php");


    }
 else{
        die("Please enter the lc_number for departure!");
    }

?>