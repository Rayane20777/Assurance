<?php


    require(__DIR__ . "/../models/Claim.php");
    require(__DIR__ . "/../service/ServiceClaim.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action']=='addClaim'){

        $id = uniqid(mt_rand(), true);
        $description = $_POST['description'];
        $date = $_POST['date'];
        $article_id = $_POST['article_id'];



        $claim = new Claim($id, $description, $date, $article_id);

        $service = new ServiceClaim();
        
        $service->insert($claim);

        header("Location: ../../public/claim.php");


    } else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action']=='editClaim'){

        $id = $_POST['id'];
        $description = $_POST['description'];
        $date = $_POST['date'];
        $article_id = $_POST['article_id'];



        $claim = new Claim($id, $description, $date, $article_id);

        $service = new ServiceClaim();
        
        $service->edit($claim);

        header("Location: ../public/claim.php");


    }else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action']=='deleteClaim'){

        $id = $_POST['delete_id'];

        $service = new ServiceClaim();
        
        $service->delete($id);

        header("Location: ../../public/claim.php");


    } else {
        
        $service = new ServiceClaim();
        
        $claims = $service->display();

    }


?>