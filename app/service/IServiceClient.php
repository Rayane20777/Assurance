<?php

    interface IService {
        function insert(Client $client);
        function delete($id);
        function display();
        
    }

?>