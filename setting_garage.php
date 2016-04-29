<?php
    
                                        session_start();
                                        $name = $_POST['name_garage'];
                                        $capacity = $_POST['capacity_garage'];

                                        if($name && $capacity) {
                                            $connect = mysql_connect("localhost","root","") or die("Couldn't connect to the DB!!");
                                            mysql_select_db("parking_registration") or die("Couldn't find database");

                                            $sql = "INSERT INTO garage (garage_name, capacity , available_slot) VALUES ('$name', '$capacity' , '$capacity')";
                                            $query = mysql_query($sql);
                                            
                                            $sql_garage_id = "SELECT garage_id From garage WHERE garage_name = '$name'";
                                            $query_garage_id = mysql_result(mysql_query($sql_garage_id),0);
                                            
                                            for($i = 0 ; $i < $capacity ; $i++){
                                                $sql_create_parking_slot = "INSERT INTO parking_slot (garage_id) VALUES ('$query_garage_id')";
                                                $query = mysql_query($sql_create_parking_slot);
                                            }
                                            
                                            header("Location:setting.php");
                                        }
                                        else{
                                            die("Please enter the name garage and capacity!");
//                                            header("Location:setting.php");
                                        }

                                        ?>
                                        
                                       
<!--
                                    button add ->  add_garage
                                    button delete -> delete_garage
                                    
                                    id garage -> select_garage-->
