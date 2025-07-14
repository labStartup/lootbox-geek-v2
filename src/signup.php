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

    // Campo image_user:
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] !== UPLOAD_ERR_NO_FILE)
    {
        // Pegar o nome e o caminho da imagem para salvar e usar depois:
        $imagem = "../src/img/user/".$_FILES['imagem']['name'];

        // comando para mover o arquivo para pasta no nosso diretório:
        move_uploaded_file($_FILES['imagem']["tmp_name"], $imagem);
    }else
    {
        $imagem = "../src/img/user/default.jpeg";
    }

    // Prepara o INSERT com proteção contra SQL Injection
    $stmt = $conn->prepare("INSERT INTO user_registration (username, email, password_login, image_user) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $signup_user, $signup_email, $senhaHash, $imagem);

    // Executa e verifica se deu certo
    if ($stmt->execute()) {
        // echo "Cadastro realizado com sucesso!";
        // Redirecionar para login, se desejar:
        $_SESSION['cadastro_sucesso'] = true;
        header("Location: ../public/login.php");
        exit;
    } else {
        echo "Erro ao cadastrar: " . $stmt->error;
    }
} else {
    echo "Preencha todos os campos!";
}
?>
