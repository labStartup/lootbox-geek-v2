<?php
session_start();

// Incluindo configuração do banco de dados -> tabela usuários
include_once './config.php';
// print_r($_REQUEST);

/* Verificar se existe um submit no meu formulário (isset() é função para isso). Também precisamos verificar se há email preenchido e senha preenchida. 
Como esses inputs não podem ser vazios, então precisamos verificar se há dados sendo enviados pelo sistema */
if (isset($_POST['enviar']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    // Acessa
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    // Agora vamos fazer uma verificação se há este email e senha cadastrados na nossa base de dados
    $stmt = $conn->prepare("SELECT * FROM user_registration2 WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows < 1) {
        // Não existe usuário com este login e senha

        // Destruir qualquer sessão criada:
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../public/index.php');
        exit;
    }

    $user = $result->fetch_assoc();

    if (password_verify($senha, $user['password_login'])) {
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        header('Location: ../public/system.php');
        exit;
    } else {
        // significa que senha email correto mas senha incorreta.
        // Criar sessão para mensagem de senha incorreta:
        $_SESSION['senha_incorreta'] = true;
        header('Location: ../public/login.php');   
        exit;
    }
} else {
    echo 'Não acessou meu sistema';
}
?>
