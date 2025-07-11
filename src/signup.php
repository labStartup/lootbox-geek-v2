<!-- Verificar se foi feito o submit -->
<?php
// Iniciando a session
session_start();

include_once './config.php';

if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['username'])) {
    // Estamos no formulário de cadastro, pois se este bloco for executado, significa que 'username' não foi preenchido.

    // print_r($_POST['username']);
    // print_r($_POST['email']);
    // print_r($_POST['senha']);

    $signup_email = $_POST['email'];
    $signup_senha = $_POST['senha'];
    $signup_username = $_POST['username'];
    
    // unset($_SESSION['variable']);
    // $variable = 0;
    $_SESSION['variable'] = 0;
    # Precisamos verificar se há email cadastrado:
    $sql = "SELECT email FROM user_registration WHERE email = '$signup_email'";
    // No resultado da consulta, o que nos interessa é se há uma linha de resposta (num_rows). Esta é uma propriedade do objeto criado abaixo. 
    $result = mysqli_query($conn, $sql);

    // print_r($result);
    // print_r('<br>');
    // print_r($sql);

    # Se o num_rows for > 0, significa que existe usuário com este email cadastrado
    if ($result->num_rows > 0) {
        // variável de controle:
        // $variable = 1;
        unset($_SESSION['variable']);
        $_SESSION['variable'] = 1;

        header("Location: ../public/index.php");
    } else {
        $_SESSION['variable'] = 0;
        // Aqui vai o código para inserir os dados da db.
        $insert = "INSERT INTO user_registration (id_user, username, email, password_login) VALUES ('', '$signup_username', '$signup_email', '$signup_senha')";

        $result = mysqli_query($conn, $insert);
        // Agora é só redirecionar para a página de login.
        header("Location: ../public/index.php");
    }
}
?>