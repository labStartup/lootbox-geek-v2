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
    <h1>Fazer o cadastro amanhã</h1>

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

        <!-- senha -->
        <label for="senha">Senha </label>
        <input
            type="password"
            name="senha"
            placeholder="•••••••••"
            maxlength="25"
            required>

        <!-- imagem -->
        <label>Selecione a imagem</label>
        <input
            type="file"
            name="imagem"
            accept="image/*" class="form-control" />

        <!-- submit -->
        <input type="submit" name="submit" value="entrar">
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>