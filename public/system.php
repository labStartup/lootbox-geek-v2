<!-- Usuário só pode chegar aqui se tiver logado. No momento do testLogin.php, em que é logado, é criado uma sessão com o campo 'email' e 'senha'. Assim, precisamos verificar se está de acordo -->
<?php
    session_start();
    // print_r($_SESSION);
    // Verificar se há sessão criada
    include_once "../src/config.php";
    
    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../public/index.html');
    }
    $logado = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/global/global.css">
    <title>Document</title>
    <style>
        .navbar{
            max-width: 1280px;
            background-color: bisque;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 12px;
            border-radius: 12px 30px;
            font-size: 12px;
        }

        .navbar__link{
            text-decoration: none;
            color: black;
            font-size: 15px;
            font-weight: 600;
            background-color:rgb(209, 91, 13);
            padding: 8px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1 class="navbar__title">
            lootbox-geek
        </h1>
        <a href="../src/logout.php" class="navbar__link">Sair</a>
    </div>
    <div class="interface">
        <h1 style="text-align:center">logado <?= $logado?></h1>
    </div>
</body>
</html>