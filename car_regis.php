
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Registeration Card</title>
        <link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.css">
        <link rel="stylesheet" href="main.css">
        <script src="jquery-2.1.4.min.js"></script>
        <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    </head>
    <body id="bg">
        <div class="container" id="foreground">
            <nav class="navbar navbar-default" id="nav_bar">
                <ul id="myTab" class="nav navbar-nav navbar-left">
                    <li class="active text-center" id="customer" style="width: 150px"><a href="#profile" data-toggle="tab" ><h3>Customer</h3></a></li>
                    <li class="text-center" id="car_regis_tab" style="width: 150px"><a href="#Car_regis_content" data-toggle="tab"><h3>Arrival</h3></a></li>
                    <li class="text-center" id="car_depart_tab" style="width: 150px"><a href="#Car_depart_content" data-toggle="tab"><h3>Departure</h3></a></li>
                </ul>
                <ul id="myTab-right" class="nav navbar-nav navbar-right">
                    <li class=""><button class="btn btn-default" type="button" id="setting"><a href="setting.php">Setting</a></button></li>
                </ul>
                <br>

                <br>

                <br>

                <div id="myTabContent" class="tab-content">

                    <div class="tab-pane fade active in"  id="profile">
                        <br>
                        <br>
                        <br>
                        <form method = "post" action = "setting_customer.php" id = "add_garage_action">
                            <div class="row" id="input2">
                                <div class="input-group">
                                    <input type="text" id="input-idcard"
                                           class="form-control" 
                                           placeholder="ID card number" name="idcard_person">
                                </div>
                                <br>
                                <div class="input-group">
                                    <div class="row">
                                        <div class="col-md-6"> <input type="text" id="input-name"
                                                                      class="form-control" 
                                                                      placeholder="Customer Name" name="name_person" ></div>
                                        <div class="col-md-6"> <input type="text" id="input-lastname"
                                                                      class="form-control" 
                                                                      placeholder="Customer LastName" name="lastname_person" ></div>

                                    </div>

                                </div>
                                <br>
                                <div class="row text-right">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="submit" id="finish"   >Finish</button>
                                    </span>
                                </div>
                                <br>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="Car_regis_content">
                        <br>
                        <br>
                        <br>
                        <form method = "post" action = "setting_car.php" id = "add_car_action">
                            <div class="row" id="input">
                                <div class="row">
                                    <div class="input-group">
                                        <input type="text" id="input-lc" class="form-control" placeholder="Car License" name="lc_number" >
                                    </div>
                                </div>
                                <div class="row"><br></div>
                                <div class="row">
                                        <div class="form-group">
                                        <label for="sel1">brand:</label>
                                        <select name="car_brand" class="form-control" id="sel1"  >

                                        <?php

                                            session_start();
                                            $connect = mysql_connect("localhost","root","") or die("Couldn't connect to the DB!!");
                                            mysql_select_db("parking_registration") or die("Couldn't find database");

                                            $query = "SELECT * FROM brand";
                                            $result = mysql_query($query);
                                            while ($rows = mysql_fetch_array($result)) {
                                                echo "<option value=" .$rows['name']. ">" .$rows['name']. "</option>";
                                            }

                                        ?>
                                        </select>
                                    </div>


                                </div>
                                <br>
                                <div class="row">
                                    <input type="text" id="input-brand" class="form-control" placeholder="idcard number" name="idcard" >
                                </div>
                                <br>
                                <div class="row text-right">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="submit" id="submit_btn">Submit</button>
                                    </span>
                                </div>
                                <br>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade" id="Car_depart_content">
                        <br>
                        <br>
                        <br>
                        <form method = "post" action = "setting_departure.php" id = "add_car_action">
                            <div class="row" id="input">
                                <div class="row">
                                
                                   
                      
                                    <div class="bs-searchbox">
                                     <div class="form-group">
                                        
                                        <select name="lc_leave_number" class="form-control" id="sel2" data-live-search="true" >

                                        <?php

                                            $connect = mysql_connect("localhost","root","") or die("Couldn't connect to the DB!!");
                                            mysql_select_db("parking_registration") or die("Couldn't find database");


                                            $sql_slot_unavailable = mysql_query("SELECT slot_id FROM parking_slot WHERE status = 'Unavailable'");

                                            $row_slot = mysql_num_rows($sql_slot_unavailable);

                                            for ($i = 0 ; $i < $row_slot ;$i++  ) {
                                                $slot_id_result = mysql_result($sql_slot_unavailable,$i);
                                                $sql_car_id = mysql_query("SELECT car_id FROM parking_card WHERE slot_id = '$slot_id_result' AND departure_status = 'wait' ");
                                                $car_id_result = mysql_result( $sql_car_id,0);
                                                $car_license_number = mysql_query("SELECT license FROM car WHERE car_id = '$car_id_result'");
                                                $license_result = mysql_result($car_license_number,0);
                                                
                                                
                                                
                                                if($license_result)
                                                echo "<option value=" .$license_result. ">" .$license_result. "</option>";
                                            }

                                        ?>
                                        </select>
                                    </div>
                                    </div>
                                    
                                    
                                    
                                </div>
                                <div class="row"><br></div>

                                <br>

                                <br>
                                <div class="row text-right">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="submit" id="leave_btn">Leave</button>
                                    </span>
                                </div>
                                <br>
                            </div>
                        </form>
                    </div>

                </div>
            </nav>

            <div class="row" id="status">
                <div class="panel panel-default" id="panel_status">





                    <div class="panel-heading">Garage Status</div>
                    <div class="panel-body">
                    <?php

                            $connect = mysql_connect("localhost","root","") or die("Couldn't connect to the DB!!");
                            mysql_select_db("parking_registration") or die("Couldn't find database");

                            # Prepare the SELECT Query
                            $selectSQL = 'SELECT * FROM garage';
                            $selectRes = mysql_query($selectSQL);

                    ?>
                    
                                                       
                    <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Name Gargage</th>
                            <th>Available</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                            if( mysql_num_rows( $selectRes )==0 ){
                                echo '<tr><td colspan="2">No Rows Returned</td></tr>';
                            }else{
                                while( $row = mysql_fetch_assoc( $selectRes ) ){
                                    echo "<tr><td>{$row['garage_name']}</td><td>{$row['available_slot']}</td></tr>\n";
                                }
                            }
                    ?>

                    </tbody>
                    </table>

                    </div>
                </div>
            </div>

        </div>


    </body>
    <script src="jquery-2.1.4.min.js"></script>
    <script>
        $('#submit_btn').click(function(){
            $("#car_regis_tab").removeClass("active");
            $("#customer").addClass("active");
            $("#Car_regis_content").removeClass('active in');
            $("#profile").addClass('active in');
        });
        $('#finish').click(function(){
            $("#customer").removeClass("active");
            $("#car_regis_tab").addClass("active");
            $("#profile").removeClass('active in');
            $("#Car_regis_content").addClass('active in');

        });
    </script>
</html>