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
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
// Comando para criar tabela no banco de dados 'lootbox_db'
// ATENÇÃO! EXECUTE O CÓDIGO ABAIXO APENAS UMA VEZ. DEPOIS DE EXECUTADO, COMENTE EM BLOCO:

// $sql = "CREATE TABLE user_registration(
//     id_user INT AUTO_INCREMENT PRIMARY KEY,
//     username VARCHAR(50) NOT NULL,
//     email VARCHAR(100) NOT NULL UNIQUE,
//     password_login VARCHAR(255) NOT NULL,
//     image_user VARCHAR(255) DEFAULT NULL DEFAULT '../src/img/user/default.jpeg',
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
//     );";

//     $result = mysqli_query($conn, $sql);

?>