<?php

    interface IService {
        function insert(Insurer $client);
        function delete($id);
        function display();
        
    }

?>