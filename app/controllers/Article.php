<?php


    require(__DIR__ . "/../models/Article.php");
    require(__DIR__ . "/../service/ServiceArticle.php");

    if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action']=='addArticle'){

        $id = uniqid(mt_rand(), true);
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = $_POST['date'];
        $insurer_id = $_POST['insurer_id'];
        $client_id = $_POST['client_id'];



        $article = new Article($id, $title, $content, $date, $insurer_id, $client_id);

        $service = new ServiceArticle();
        
        $service->insert($article);

        header("Location: ../../public/article.php");


    } else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action']=='editArticle'){

        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $date = $_POST['date'];
        $insurer_id = $_POST['insurer_id'];
        $client_id = $_POST['client_id'];



        $article = new Article($id, $title, $content, $date, $insurer_id, $client_id);

        $service = new ServiceArticle();
        
        $service->edit($article);

        header("Location: ../public/article.php");


    }else if ($_SERVER['REQUEST_METHOD'] == "POST" && $_POST['action']=='deleteArticle'){

        $id = $_POST['delete_id'];

        $service = new ServiceArticle();
        
        $service->delete($id);

        header("Location: ../../public/article.php");


    } else {
        
        $service = new ServiceArticle();
        
        $articles = $service->display();

    }


?>