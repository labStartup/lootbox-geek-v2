<!-- Verificar se foi feito o submit -->
<?php
session_start();
include_once './config.php'; // Conexão com o banco

if (isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    // print_r($_REQUEST);
    // Recebe os dados do formulário
    $signup_user = $_POST['username'];
    $signup_email = $_POST['email'];
    $signup_senha = $_POST['senha'];

    // Cria o hash seguro da senha
    $senhaHash = password_hash($signup_senha, PASSWORD_DEFAULT);

    // Prepara o INSERT com proteção contra SQL Injection
    $stmt = $conn->prepare("INSERT INTO user_registration (username, email, password_login) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $signup_user, $signup_email, $senhaHash);

    // Executa e verifica se deu certo
    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
        // Redirecionar para login, se desejar:
        header("Location: ../public/login.php");
        // exit;
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }
} else {
    echo "Preencha todos os campos!";
}
?>
