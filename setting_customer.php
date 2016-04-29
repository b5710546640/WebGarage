        <?php
        session_start();
    $idcard = $_POST['idcard_person'];
    $name_ps = $_POST['name_person'];
    $lastname_ps = $_POST['lastname_person'];

    
    if($idcard && $name_ps && $lastname_ps  ) {
        $connect = mysql_connect("localhost","root","") or die("Couldn't connect to the DB!!");
        mysql_select_db("parking_registration") or die("Couldn't find database");

        $sql = "INSERT INTO person (id_card_number, person_name , person_lastname) VALUES ('$idcard', '$name_ps' , '$lastname_ps')";

        $query = mysql_query($sql);
        
        echo  "idcard name lastname sucess";
        
         header("Location: car_regis.php");

    }

    else{
        die("Please enter the idcard, name, lastname!");
    }



        ?>