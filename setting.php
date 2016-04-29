<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Setting</title>
        <link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.css">
        <script src="jquery-2.1.4.min.js"></script>
        <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
        <style>
            #bg{
                height: 800px;
                background-color: white;
                padding-left: 100px;
                padding-right: 100px;
            }
            #garage_all{
                padding-left: 100px;
                padding-right: 100px;
            }
            #tab-menu{
                padding-left: 100px;
                padding-right: 100px;
            }
            #btn-submit-dv{
                padding-left: 100px;
                padding-right: 100px;
            }
            
        </style>
    </head>
    <body id="bg">
        <nav class="navbar navbar-default">
            <div class="row" id = "tab-menu">
            <ul id="myTab" class="nav navbar-nav navbar-left">
                <li class="active" id="homepage"><a href="#Garage_slot" data-toggle="tab">Garage Setting</a></li>
                <li class="" id="customer"><a href="#Brand" data-toggle="tab">Brand</a></li>
                <li class="" id="customer"><a href="#Regis_table" data-toggle="tab">Registration Table</a></li>
            </ul>
            <ul id="myTab-right" class="nav navbar-nav navbar-right">
                <li class=""><button class="btn btn-default" type="button" id="setting"><a href="car_regis.php">Back to home page</a></button></li>
            </ul>
            </div>
            

            <br>

            <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade active in" id="Garage_slot">
                    <br>
                    <div class="row" id="garage_all">
                        <br>
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 40%">Name Garage</th>
                                        <th style="width: 30%">#Slot</th>
                                        <th style="width: 30%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>A</td>
                                        <td>10</td>
                                        <td><span class="input-group-btn">
                                            <button class="btn btn-default" type="button" id="submit_btn" href="#profile" data-toggle="tab">edit</button>
                                            </span></td>
                                    </tr>
                                    <tr>
                                        <td>B</td>
                                        <td>10</td>
                                        <td><span class="input-group-btn">
                                            <button class="btn btn-default" type="button" id="submit_btn" href="#profile" data-toggle="tab">edit</button>
                                            </span></td>
                                    </tr>
                                    <tr>
                                        <td>C</td>
                                        <td>10</td>
                                        <td><span class="input-group-btn">
                                            <button class="btn btn-default" type="button" id="submit_btn" href="#profile" data-toggle="tab">edit</button>
                                            </span></td>
                                    </tr>
                                    <form method = "post" action = "setting_garage.php" id = "add_garage_action">
                                        <tr>

                                            <td><input type="text" id="name_garage" class="form-control" placeholder="new garage" name = "name_garage" ></td>
                                            <td><input type="text" id="capacity_garage" class="form-control" placeholder="capacity" name="capacity_garage" ></td>
                                            <td><span class="input-group-btn">
                                                <button class="btn btn-success" type="submit" id="add_garage_btn">Add Garage
                                    
                                                </button> 
                                                </span></td> 

                                        </tr>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row"><br></div>
                    <div class="row">

                    </div>
                    <br>
                    
                    <br>
                </div>
                <div class="tab-pane fade" id="Brand">
                    <div class="container-fluid">
                        <div class="row">
                            <form method = "post" action = "setting_brand.php" id = "add_garage_action">
                                <div class="col-md-6"><input type="text" id="new_brand" class="form-control" placeholder="new brand" name="car_brand"></div>
                                <div class="col-md-6 text-left">
                                    <span class="input-group-btn">
                                        <button class="btn btn-success" type="submit" id="add_brand_btn">Add</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div class="row"><br></div>
                        <div class="row">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width: 50%">Brand</th>
                                        <th style="width: 50%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Toyota</td>
                                        <td><span class="input-group-btn">
                                            <button class="btn btn-default " type="button" id="submit_btn" href="#profile" data-toggle="tab">edit</button>
                                            </span></td>
                                    </tr>
                                    <tr>
                                        <td>Honda</td>
                                        <td><span class="input-group-btn">
                                            <button class="btn btn-default" type="button" id="submit_btn" href="#profile" data-toggle="tab">edit</button>
                                            </span></td>
                                    </tr>
                                    <tr>
                                        <td>Suzuki</td>
                                        <td><span class="input-group-btn">
                                            <button class="btn btn-default" type="button" id="submit_btn" href="#profile" data-toggle="tab">edit</button>
                                            </span></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="Regis_table">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#License Number</th>
                                <th>#Slot</th>
                                <th>Arrival Time</th>
                                <th>Departure Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>License1</td>
                                <td>A1</td>
                                <td>10.00</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>License2</td>
                                <td>A2</td>
                                <td>10.00</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>License3</td>
                                <td>A3</td>
                                <td>10.00</td>
                                <td>-</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            </div>
        </nav>
        <?php
        
        $connect = mysql_connect("localhost","root","") or die("Couldn't connect to the DB!!");
        mysql_select_db("parking_registration") or die("Couldn't find database");
        
        $count = mysql_query("SELECT COUNT(*) FROM brand");
        $count_result = mysql_result($count,0);
        for($i = 1 ; $i <= $count_result ; $i++){
            $query = mysql_query("SELECT name FROM brand WHERE id_brand = '$i' ");
            $brand_name = mysql_result($query,0);  
            echo $brand_name;
        }
    ?>
    </body>

</html>