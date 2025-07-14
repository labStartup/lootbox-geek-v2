<?php
session_start();
// Controle de senhas: 
$senhas_diferentes = isset($_SESSION['senhas_iguais']) && $_SESSION['senhas_iguais'] === false;
unset($_SESSION['senhas_iguais']);

// Controle de se existe email
$existe_email = isset($_SESSION['existe_email']) && $_SESSION['existe_email'] === true;
unset($_SESSION['existe_email']);


?>
<!-- Está é uma subpágina da index -->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Cadastro | Loot box Geek</title>
    <style>
        a {
            font-size: 2em;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <h1>Formulário de cadastro</h1>

    <a href="index.html" style="display: block" ;>inicio</a>
    <a href="login.php">login</a>

    <form action="../src/signup.php" method="POST" enctype="multipart/form-data">

        <!-- username -->
        <label for="username">
            Nickname </label>
        <input
            type="text"
            name="username"
            placeholder="Nickname"
            maxlength="25"
            required>

        <!-- email -->
        <label for="email">
            E-mail </label>
        <input type="text"
            name="email"
            placeholder="Seu melhor e-mail"
            maxlength="25"
            required>

        <!-- Span para indicar que existe email cadastrado -->
        <span id="existeEmail" data-existe="<?= $existe_email ? 'true' : 'false' ?>" style="display: none">Já existe email cadastrado, tente outro!</span>

        <!-- senha -->
        <label for="senha">Senha </label>
        <input
            type="password"
            name="senha"
            placeholder="•••••••••"
            maxlength="25"
            required>

        <!-- confirmar senha -->
        <label for="confirmar_senha">Confirmar senha </label>
        <input
            type="password"
            name="confirmar_senha"
            placeholder="•••••••••"
            maxlength="25"
            required>

        <!-- Span para senhas incompatíveis -->
        <span id="verificadorSenha" data-verif="<?= $senhas_diferentes ? 'true' : 'false'?>" style="display:none">As senhas não são iguais.</span>

        <!-- imagem -->
        <label>Selecione a imagem</label>
        <input
            type="file"
            name="imagem"
            accept="image/*" class="form-control" />

        <!-- submit -->
        <input type="submit" name="submit" value="entrar">
    </form>

    <!-- script para controlar mensagem de email já cadastrado -->
    <script>
        // Verificar se existe email cadastrado:
        const spanEmail = document.getElementById("existeEmail");
        // Pegar o dataset e convertendo para boleano em caso de ser "true";
        const controleEmail = spanEmail.dataset.existe === "true";

        spanEmail.style.display = controleEmail ? "inline" : "none";

        // ################################# //
        // Verificar se senhas são iguais:
        const spanSenhas = document.getElementById("verificadorSenha");
        if (spanSenhas.dataset.verif === 'true'){
            spanSenhas.style.display = 'inline';
        }

        // ################################# //
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>