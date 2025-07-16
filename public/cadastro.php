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
    <link rel="stylesheet" href="./cadastro.css">
    <title>Cadastro | Loot box Geek</title>
</head>

<body class="no-scroll">
    <header>
        <div class="interface">
            <section class="logo">
                <img src="./img/global/logo-removebg-preview.png" alt="logotipo" id="logo_header" />
            </section>

            <section>
                <button class="btn-default return">
                    <a href="./index.php">Retornar</a>
                </button>
            </section>
        </div>
    </header>
    <!-- /navbar -->

    <!-- Conteúdo principal -->
    <section class="cadastro">

        <form action="../src/signup.php" method="POST" enctype="multipart/form-data" autocomplete="off">

            <h2>Cadastro</h2>
            
            <!-- username -->
            <div class="cadastro__input">
                <input
                type="text"
                name="username"
                maxlength="25"
                required>
                <label for="username">
                    Nickname </label>
            </div>

            <!-- email -->
            <div class="cadastro__input">
                <input type="text"
                    name="email"
                    maxlength="25"
                    required>
                <label for="email">
                    E-mail </label>
            </div>

            <!-- Span para indicar que existe email cadastrado -->
            <span id="existeEmail" data-existe="<?= $existe_email ? 'true' : 'false' ?>" style="display: none">Já existe email cadastrado, tente outro!</span>
            <!-- senha -->

            <div class="cadastro__input">
                <input
                    type="password"
                    name="senha"
                    maxlength="25"
                    required>
                <label for="senha">Senha </label>
            </div>

            <!-- confirmar senha -->
            <div class="cadastro__input">
                <input
                    type="password"
                    name="confirmar_senha"
                    maxlength="25"
                    required>
                <label for="confirmar_senha">Confirmar senha </label>
            </div>
            
            <!-- Span para senhas incompatíveis -->
            <span id="verificadorSenha" data-verif="<?= $senhas_diferentes ? 'true' : 'false' ?>" style="display:none">As senhas não são iguais.</span>
            <!-- imagem -->


            <div class="cadastro__input-imagem">
                <label>Selecione a imagem</label>
                <input
                    type="file"
                    name="imagem"
                    accept="image/*" class="form-control" />
            </div>
            <!-- submit -->
            <input type="submit" name="submit" value="Cadastrar">
        </form>
        <div class="overlay"></div>
    </section>

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
        if (spanSenhas.dataset.verif === 'true') {
            spanSenhas.style.display = 'inline';
        }

        // ################################# //
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>