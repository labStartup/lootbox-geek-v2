<?php
    // Iniciando session
    session_start();

    // Incluindo configuração do banco de dados -> tabela usuários
    include_once './config.php';

    // print_r($_REQUEST);

    /* Verificar se existe um submit no meu formulário (isset() é função para isso). Também precisamos verificar se há email preenchido e senha preenchida. 
    Como esses inputs não podem ser vazios, então precisamos verificar se há dados sendo enviados pelo sistema */

    if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
        // Acessa        
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        // Agora vamos fazer uma verificação se há este email e senha cadastrados na nossa base de dados
        $sql = "SELECT * FROM user_registration WHERE email = '$email' AND password_login = '$senha'";

        $result = mysqli_query($conn, $sql);

        // print_r($result);
        // print_r('<br>');
        // print_r($sql);
        if($result->num_rows < 1){
            // Não existe usuário com este login e senha

            // Destruir qualquer sessão criada:
            unset($_SESSION['email']);
            unset($_SESSION['senha']);

            // echo 'Acesso negado';
            header('Location: ../public/index.html');
        } else{
            // Existe usuário cadastrado
            // echo 'Acesso permitido';
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;

            // Redireciona o usuário para a página web do sistema
            header('Location: ../public/system.php');
        }

    } else{
        // Senão, não acessa
        echo 'Não acessou meu sistema';
    }
    

?>