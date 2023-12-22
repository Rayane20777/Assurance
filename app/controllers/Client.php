<?php


    require(__DIR__ . "/../models/Client.php");
    require(__DIR__ . "/../service/ServiceClient.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action']=='addClient'){

        $id = uniqid(mt_rand(), true);
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $date = $_POST['date'];


        $client = new Client($id, $first_name, $last_name, $address, $date);

        $service = new ServiceClient();
        
        $service->insert($client);

        header("Location: ../../public/client.php");


    } else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action']=='editClient'){

        $id = $_POST['id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $address = $_POST['address'];
        $date = $_POST['date'];


        $client = new Client($id, $first_name, $last_name, $address, $date);

        $service = new ServiceClient();
        
        $service->edit($client);

        header("Location: ../public/client.php");


    }else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action']=='deleteClient'){

        $id = $_POST['delete_id'];

        $service = new ServiceClient();
        
        $service->delete($id);

        header("Location: ../../public/client.php");


    } else {
        
        $service = new ServiceClient();
        
        $clients = $service->display();

    }


?>