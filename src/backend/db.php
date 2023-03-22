<?php 

    $db_conn = new mysqli("localhost", "root", "", "app_omnitrix");

    if ($db_conn->connect_error) {
        die("DataBase Connection failed: " . $db_conn->connect_error);
    }

?>