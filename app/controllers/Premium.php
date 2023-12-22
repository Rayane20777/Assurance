<?php


    require(__DIR__ . "/../models/Premium.php");
    require(__DIR__ . "/../service/ServicePremium.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action']=='addPremium'){

        $id = uniqid(mt_rand(), true);
        $amount = $_POST['amount'];
        $date = $_POST['date'];
        $claim_id = $_POST['claim_id'];



        $premium = new Premium($id, $amount, $date, $claim_id);

        $service = new ServicePremium();
        
        $service->insert($premium);

        header("Location: ../../public/premium.php");


    } else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action']=='editPremium'){

        $id = $_POST['id'];
        $amount = $_POST['amount'];
        $date = $_POST['date'];
        $claim_id = $_POST['claim_id'];



        $premium = new Premium($id, $amount, $date, $claim_id);

        $service = new ServicePremium();
        
        $service->edit($premium);

        header("Location: ../public/premium.php");


    }else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action']=='deletePremium'){

        $id = $_POST['delete_id'];

        $service = new ServicePremium();
        
        $service->delete($id);

        header("Location: ../../public/premium.php");


    } else {
        
        $service = new ServicePremium();
        
        $premiums = $service->display();

    }


?>