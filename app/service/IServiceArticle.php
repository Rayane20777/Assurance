<?php

    interface IService {
        function insert(Article $article);
        function delete($id);
        function display();
        
    }

?>