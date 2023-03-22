<?php

include "db.php";

include "connection.php";

//ações de erro em cada value
$res_output = array( 
    'error' => false, 
    'nome'=> false,
    'imagem'=> false
);

//ler dados do back-end
$acao = 'ler_dados';

if (isset($_GET['acao'])) {
    $acao = $_GET['acao'];
}

if ($acao == 'ler_dados') {
    $sql = 'SELECT * FROM `aliens`';
    $query = $db_conn->query($sql);
    $aliens = array();

     while($row = $query->fetch_array()){
         array_push($aliens, $row);
     }

     $res_output['aliens'] = $aliens;
 }

include "db_close.php";

?>