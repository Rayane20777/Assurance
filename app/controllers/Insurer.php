<?php


    require(__DIR__ . "/../models/Insurer.php");
    require(__DIR__ . "/../service/ServiceInsurer.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action']=='addInsurer'){

        $id = uniqid(mt_rand(), true);
        $name = $_POST['name'];
        $address = $_POST['address'];



        $insurer = new Insurer($id, $name, $address);

        $service = new ServiceInsurer();
        
        $service->insert($insurer);

        header("Location: ../../public/insurer.php");


    } else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action']=='editInsurer'){

        $id = $_POST['id'];
        $name = $_POST['name'];
        $address = $_POST['address'];



        $insurer = new Insurer($id, $name, $address);

        $service = new ServiceInsurer();
        
        $service->edit($insurer);

        header("Location: ../public/insurer.php");


    }else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action']=='deleteInsurer'){

        $id = $_POST['delete_id'];

        $service = new ServiceInsurer();
        
        $service->delete($id);

        header("Location: ../../public/insurer.php");


    } else {
        
        $service = new ServiceInsurer();
        
        $insurers = $service->display();

    }


?>