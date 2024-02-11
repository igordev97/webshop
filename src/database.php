<?php
    $db = mysqli_connect("127.0.0.1","root","","webshop");

    if (!$db) {
        $error_msg = "Not connected to database";
        die($error_msg);
    }


?>