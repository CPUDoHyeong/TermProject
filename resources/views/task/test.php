
<?php

    $_REQ = $_SERVER["REQUEST_METHOD"];


    $data = array("123", "456", "789");

    
    
    if($_REQ == 'GET') {
        return json_encode($data);
    }

?>