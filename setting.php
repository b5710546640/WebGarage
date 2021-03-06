<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Setting</title>
        <link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.css">
        <link rel="stylesheet" href="style_settingpage.css">
        <script src="jquery-2.1.4.min.js"></script>
        <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
        <style>

            #panel_brand{
                overflow-y:scroll;
            }


        </style>
    </head>
    <body id="bg_settingpage">
        <div class="container" id="foreground_settingpage">
            <nav class="navbar navbar-default" style="height: 800px" id="AllTabs_setting">
                <div class="row" id = "tab-menu">
                    <ul id="myTab" class="nav navbar-nav navbar-left">
                        <li class="active text-center" id="homepage" style="width: 200px"><a href="#Garage_slot" data-toggle="tab"><h4>Garage Setting</h4></a></li>
                        <li class="text-center" id="customer" style="width: 150px"><a href="#Brand" data-toggle="tab"><h4>Brand</h4></a></li>
                        <li class="text-center" id="customer" style="width: 200px"><a href="#Regis_table" data-toggle="tab"><h4>Registration Table</h4></a></li>
                    </ul>
                    <ul id="myTab-right" class="nav navbar-nav navbar-right">
                        <br>
                        <li class="dropdown text-center">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Back<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="car_regis.php">Homepage</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>


                <br>

                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="Garage_slot">
                        <br>
                        <div class="row" id="garage_all">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="row">


                                        <div class="panel panel-default">

                                            <div class="panel-heading" id="header_table_garage"><div class="row">
                                                <div class="col-md-6 text-center" id="test"><h4>Name Garage</h4></div>
                                                <div class="col-md-6 text-center" id="test2"><h4>Available Slot</h4></div>
                                                </div>

                                            </div>

                                        </div>



                                    </div>
                                    <div class="row">
                                        <div class="panel panel-default" id="panel_garage">


                                            <div class="panel-body">
                                                <?php


$connect = mysql_connect("localhost","root","") or die("Couldn't connect to the DB!!");
mysql_select_db("parking_registration") or die("Couldn't find database");


# Prepare the SELECT Query
$selectSQL = 'SELECT * FROM garage';
$selectRes = mysql_query($selectSQL);

                                                ?>
                                                <table class="table table-fixed text-center" id="table_garage">
                                                    <tbody>

                                                        <?php

if( mysql_num_rows( $selectRes )==0 ){
    echo '<tr><td colspan="3">No Rows Returned</td></tr>';
}else{
    while( $row = mysql_fetch_assoc( $selectRes ) ){
        echo '<tr><td style="';
        echo 'width: 50%"';
        echo '>'.$row['garage_name'];
        echo '</td><td>'.$row['available_slot'];
        echo "</td></tr>\n";

    }
}
                                                        ?>

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                </div>







                            </div>

                            <div class="col-md-6">
                                <br><br><br>
                                <div class="row">
                                    <form method = "post" action = "setting_garage.php" id = "add_garage_action">

                                        <div class="col-md-1"></div>

                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class ="col-md-7">
                                                    <input type="text" id="name_garage" class="form-control" placeholder="new garage" name = "name_garage" >
                                                </div>

                                                <div class="col-md-5">
                                                    <input type="text" id="capacity_garage" class="form-control" placeholder="capacity" name="capacity_garage" >
                                                </div>
                                            </div>
                                            <div class="row"><br></div>
                                            <div class="row">
                                                <div class="col-md-1"></div>
                                                <div class="col-md-11">                                           

                                                    <div class="form-group">
                                                        <select name="select_garage" class="form-control" id="sel2" style="width: 100px" >

                                                            <?php

session_start();
$connect = mysql_connect("localhost","root","") or die("Couldn't connect to the DB!!");
mysql_select_db("parking_registration") or die("Couldn't find database");

$query = "SELECT * FROM garage";
$result = mysql_query($query);
while ($rows = mysql_fetch_array($result)) {
    echo "<option value=" .$rows['garage_id']. ">" .$rows['garage_name']. "</option>";
}


                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="row"><span class="input-group-btn">
                                                <button class="btn btn-success" type="submit" id="add_garage_btn" name="add_garage" alt="add_garage">Add Garage</button> 
                                                </span></div>
                                            <div class="row"><br></div>
                                            <div class="row"><span class="input-group-btn">
                                                <button class="btn btn-success" type="submit" id="add_garage_btn" name="delete_garage" alt="delete_garage">Delete</button> 
                                                </span></div>
                                        </div>



                                    </form>
                                </div>


                            </div>

                        </div>

                        <br>

                        <br>
                    </div>
                    <div class="tab-pane fade" id="Brand">
                        <div class="container-fluid">

                            <div class="row"><br></div>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col0md-10">                            


                                    <div class="panel panel-default">

                                        <div class="panel-heading" id="header_table_brand">

                                            <div class="row">
                                                <div class="col-md-7"><h4>Brand in system</h4></div>
                                                <div class="col-md-5">
                                                    <form method = "post" action = "setting_brand.php" id = "brand_action">
                                                        <div class="col-md-6"><input type="text" id="new_brand" class="form-control" placeholder="new brand" name="car_brand"></div>
                                                        <div class="col-md-6 text-left">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-success" type="submit" id="add_brand_btn">Add</button>
                                                            </span>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>

                                    </div>


                                    <div class="panel panel-default" id="panel_brand">

                                        <div class="panel-body"> 
                                            <div class="row text-center" >

                                                <div class="col-md-3"></div>
                                                <div class="col-md-6"><ul class="list-group">  

                                                    <?php

$connect = mysql_connect("localhost","root","") or die("Couldn't connect to the DB!!");
mysql_select_db("parking_registration") or die("Couldn't find database");

$all_brand = mysql_query("SELECT name FROM brand");

while ($rows_brand = mysql_fetch_array($all_brand)) {
    echo "<li class=";
    echo "list-group-item";
    echo ">".$rows_brand['name']."</li>";
}

                                                    ?>

                                                    </ul></div>
                                                <div class="col-md-3"></div>


                                            </div></div>


                                    </div>

                                </div>
                                <div class="col-md-1"></div>
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane fade" id="Regis_table">

                        <?php
$connect = mysql_connect("localhost","root","") or die("Couldn't connect to the DB!!");
mysql_select_db("parking_registration") or die("Couldn't find database");
$sql_card = mysql_query("SELECT slot_id,car_id,arrival_time,departure_status FROM parking_card");

                        ?>

                        <div class="panel panel-default">

                            <div class="panel-heading" id="header_table_reg">

                                <div class="row" style="text-align: left">
                                    <h4>&nbsp;&nbsp;Car Registration</h4></div>
                                </div>

                            </div>

                    

                        <div class="panel panel-default" id="panel_car_registration_report">

  
                            <div class="panel-body">
                                <table class="table table-fixed">
                                    <thead>
                                        <tr>
                                            <th>#License Number</th>
                                            <th>#Slot</th>
                                            <th>Arrival Time</th>
                                            <th>Departure Time</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
if( mysql_num_rows( $sql_card )==0 ){
    echo '<tr><td colspan="2">No Rows Returned</td></tr>';
}else{

    while( $row = mysql_fetch_assoc( $sql_card ) ){

        $slot_id = $row['slot_id'];
        $slot_car_id = $row['car_id'];
        $arrival_result = $row['arrival_time'];
        $depart_result = $row['departure_status'];

        $sql_license = mysql_query("SELECT license FROM car WHERE car_id = '$slot_car_id'");
        $license = mysql_result($sql_license,0);

        $sql_garage_id = mysql_query("SELECT garage_id FROM parking_slot WHERE slot_id = '$slot_id'");
        $garage_id = mysql_result($sql_garage_id,0);

        $sql_garage_name = mysql_query("SELECT garage_name FROM garage WHERE garage_id = '$garage_id'");
        $garage_name = mysql_result($sql_garage_name,0);

        $slot_name = $garage_name . "-" . $slot_id;


        echo "<tr><td>{$license}</td><td>{$slot_name}</td><td>{$arrival_result}</td><td>{$depart_result}</td></tr>\n";
    }

}
                                        ?>

                                    </tbody>
                                </table> 
                                
                            </div>
                        </div>

    </div>

                </div>
                </div>


                </div>
            </nav>
        </div>
    <?php

$connect = mysql_connect("localhost","root","") or die("Couldn't connect to the DB!!");
mysql_select_db("parking_registration") or die("Couldn't find database");

$count = mysql_query("SELECT COUNT(*) FROM brand");
$count_result = mysql_result($count,0);
for($i = 1 ; $i <= $count_result ; $i++){
    $query = mysql_query("SELECT name FROM brand WHERE id_brand = '$i' ");
    $brand_name = mysql_result($query,0);  

}
    ?>
    </body>
<script src="jquery-2.1.4.min.js"></script>

<script type='text/javascript'>
    var checkBrand = "<?php echo $_SESSION['report_brand_fail'] ?>";
    alert(checkBrand);
    <?php unset($_SESSION['report_brand_fail']); ?>
</script>

</html>