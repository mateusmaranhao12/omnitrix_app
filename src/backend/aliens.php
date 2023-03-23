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

 if ($acao == 'adicionar_alien') {

    function checkStr($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $nome = checkStr($_POST['nome']);
    $imagem = checkStr($_POST['imagem']);

    if (!$nome) {

        $res_output['nome'] = true;
        $res_output['mensagem_erro'] = 'Informe o nome do alienígena!';

    } else if (!$imagem) {

        $res_output['imagem'] = true;
        $res_output['mensagem_erro'] = 'Informe a imagem do alienígena!';

    } else {

        $sql = "SELECT * FROM aliens WHERE imagem='$imagem'";
        $query = $db_conn->query($sql);

        if ($query->num_rows > 0) {

            $res_output['imagem'] = true;
            $res_output['mensagem_erro'] = 'Alien já disponível no omnitrix!';

        } else {
            $sql = "INSERT INTO aliens (nome, imagem) VALUES ('$nome', '$imagem')";
            $query = $db_conn->query($sql);

            if ($query) {
                $res_output['mensagem_sucesso'] = 'Alienígena adicionado com sucesso e já disponível no omnitrix!';
            } else {
                $res_output['error'] = true;
                $res_output['mensagem_erro'] = 'Não foi possível adicionar o respectivo alien ao omnitrix :(';
            }
        }
    }

 }

include "db_close.php";

?>