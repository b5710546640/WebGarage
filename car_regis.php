
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Registeration Card</title>
        <link rel="stylesheet" href="bootstrap-3.3.5-dist/css/bootstrap.css">
        <link rel="stylesheet" href="main.css">
        <script src="jquery-2.1.4.min.js"></script>
        <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    </head>
    <body id="bg">
        <div class="container" id="foreground">
            <nav class="navbar navbar-default">
                <ul id="myTab" class="nav navbar-nav navbar-left">
                    <li class="active" id="customer"><a href="#profile" data-toggle="tab" >Customer</a></li>
                    <li class="" id="car_regis_tab"><a href="#Car_regis_content" data-toggle="tab">Car</a></li>
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
                        <form method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
                                                        ?>" id = "add_garage_action">
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
                                                                      placeholder="Customer Name" name="lastname_person" ></div>

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
                        <form method = "post" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
                                                        ?>" id = "add_car_action">
                            <div class="row" id="input">
                                <div class="row">
                                    <div class="input-group">
                                        <input type="text" id="input-lc" class="form-control" placeholder="Car License" name="lc_number" >
                                    </div>
                                </div>
                                <div class="row"><br></div>
                                <div class="row">
<!--                                    <input type="text" id="input-brand" class="form-control" placeholder="Car brand" name="car_brand" >-->
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
                            </from>
                    </div>

                </div>
            </nav>

            <div class="row" id="status">
                <div class="panel panel-default">

                    <div class="panel-heading">Aviable Garage</div>
                    <div class="panel-body">
                        <div class="col-md-4 text-center">Col1</div>
                        <div class="col-md-4 text-center">Col2</div>
                        <div class="col-md-4 text-center">Col3</div>
                    </div>
                    <table class="table">
                        <div class="col-md-4 text-center">Avaible 10</div>
                        <div class="col-md-4 text-center">Full</div>
                        <div class="col-md-4 text-center">Avaible 5</div>
                    </table>
                </div>
            </div>

        </div>
        <?php
//        session_start();
if(!empty($_POST['idcard_person']) && !empty($_POST['name_person']) && !empty($_POST['lastname_person']) ){
    $idcard = $_POST['idcard_person'];
    $name_ps = $_POST['name_person'];
    $lastname_ps = $_POST['lastname_person'];


    if($idcard && $name_ps && $lastname_ps  ) {
        $connect = mysql_connect("localhost","root","") or die("Couldn't connect to the DB!!");
        mysql_select_db("parking_registration") or die("Couldn't find database");

        $sql = "INSERT INTO person (id_card_number, person_name , person_lastname) VALUES ('$idcard', '$name_ps' , '$lastname_ps')";

        $query = mysql_query($sql);

    }

    else{
        die("Please enter the idcard, name, lastname!");
    }
}
else if(!empty($_POST['lc_number']) && !empty($_POST['car_brand']) && !empty($_POST['idcard']) ){

    $license = $_POST['lc_number'];
    $carBrand = $_POST['car_brand'];
    $idcard_car = $_POST['idcard'];
    if($license && $carBrand && $idcard_car ){
        $connect = mysql_connect("localhost","root","") or die("Couldn't connect to the DB!!");
        mysql_select_db("parking_registration") or die("Couldn't find database");
        $id = mysql_query("SELECT person_id FROM person WHERE id_card_number = '$idcard_car' ");
        $id_result =  mysql_result($id,0);


        $sql2 = "INSERT INTO car (license, brand , person_id) VALUES ('$license', '$carBrand' , '$id_result')";

        $query2 = mysql_query($sql2);

    }
}


        ?>

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