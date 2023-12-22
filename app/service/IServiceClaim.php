<?php

    interface IService {
        function insert(Claim $claim);
        function delete($id);
        function display();
        
    }

?>