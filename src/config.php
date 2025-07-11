<?php
    // Criar conexão com o banco de dados
    $servidor = "localhost";
    $user = "root";
    $password = "";
    $database = "lootbox_db";

    // Estabelecendo conexão
    $conn = mysqli_connect($servidor, $user, $password, $database);

    // if ($conn){
    //     echo "conectado com sucesso";
    // }
    // else{
    //     echo mysqli_connect_errno($conn);
    // }

?>