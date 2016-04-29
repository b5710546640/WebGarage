<?php
        
        $connect = mysql_connect("localhost","root","") or die("Couldn't connect to the DB!!");
        mysql_select_db("parking_registration") or die("Couldn't find database");
        
        $n_all = mysql_query("SELECT person_name FROM person");
        $count_result = mysql_result($n_all,20);
       
            echo $count_result;

    ?>