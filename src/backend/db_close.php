<?php

    $db_conn->close();
    //simple pass a json format data in php 
    header("Content-type: application/json");
    echo json_encode($res_output);
    die();

?>