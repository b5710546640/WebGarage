        <?php
          session_start();
    $license_leave = $_POST['lc_leave_number'];

    if($license_leave ){
        $connect = mysql_connect("localhost","root","") or die("Couldn't connect to the DB!!");
        mysql_select_db("parking_registration") or die("Couldn't find database");
        
        
        $carid = mysql_query("SELECT car_id FROM car WHERE license = '$license_leave' ")
        $carid_result =  mysql_result($carid,0);
        
        $slotid = mysql_query("SELECT slot_id FROM parking_card WHERE car_id = '$carid' ")
        $slotid_result =  mysql_result($slotid,0);
        
        //Delete that parkng_card
         $id = mysql_query("DELETE FROM parking_card WHERE car_id = '$carid' ");
        
        $updateslot = mysql_query("");
       

        

         header("Location: car_regis.php");


    }
 else{
        die("Please enter the lc_number for departure!");
    }

?>