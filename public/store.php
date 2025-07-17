<?php
    session_start();
    include_once '../src/config.php';

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        // Usuário acessou sem email e senha no login.
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../public/index.php');
        exit;
    }

    if(isset($_SESSION['username']) && isset($_SESSION['image_user']) && !empty($_SESSION['username']) && !empty($_SESSION['username']))
    {
        $username = $_SESSION['username'];
        $image_user = $_SESSION['image_user'];

    }

    $quantidade = array_sum($_SESSION['carrinho'] ?? []); 

    // Consulta para pegar produtos ativos de acordo com as categorias
    $categoriaId = $_GET['categoria'] ?? null;
    $categoriaSelecionada = $_GET['categoria'] ?? null;

    $sql = "
        SELECT p.id,
            p.nome,
            p.preco,
            p.imagem,
            p.quantidade,
            c.nome AS categoria
        FROM produtos p
        LEFT JOIN categorias c ON p.categoria_id = c.id
        WHERE p.ativo = 1
    ";

    if ($categoriaId) {
        $categoriaId = intval($categoriaId); // segurança básica
        $sql .= " AND p.categoria_id = $categoriaId";
    }

    $result = $conn->query($sql);

    $produtos = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // NÃO subtraia nada: use apenas o estoque direto do banco
            $row['quantidade_disponivel'] = $row['quantidade'];
            $produtos[] = $row;
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="script.js" defer></script>
    <link rel="stylesheet" href="style_store.css" media="all">
    <link rel="stylesheet" href="media_queries.css" media="screen">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="shortcut icon" href="./img/_outros/info-perfil.png" type="image/x-icon">
    <title>Store</title>
</head>

<body>
    <div class="fundo-escuro"></div>
    <aside id="menu-lateral">
        <div id="perfil">
            <img src="<?= $image_user ?>" alt="Informação da Conta" width="45">
            <div id="info">
                <p>Olá, <em><?= ucfirst($username) ?>!</em></p>
                <a href="carrinho.php" target="_self"> Carrinho: <span id="badge-carrinho"><?= $quantidade ?></span></a>
            </div>
        </div>

        <h1>Categorias</h1>
        <ul type="none">
            <li data-categoria="0" onclick="filtrarCategoria(0)">Mostrar tudo</li>
            <li data-categoria="1" onclick="filtrarCategoria(1)">Roupas personalizadas</li>
            <li data-categoria="2" onclick="filtrarCategoria(2)">Copos personalizados</li>
            <li data-categoria="3" onclick="filtrarCategoria(3)">Action figure</li>
        </ul>
        <nav id="nav-footer-aside">
            <a href="#" target="_self"><i class="fas fa-home"></i> Início</a>
            <a href="../src/logout.php" target="_self"><i class="fas fa-door-open"></i> Logout</a>
        </nav>
    </aside>
    <button id="botao-menu-lateral" title="Mostrar Menu"></button>

    <div id="busca">
        <button id="botao-limpar" title="Limpar filtro">Limpar busca</button>
        <button id="botao-busca" title="Buscar produtos">Buscar</button>
        <input type="search" id="campo-busca" placeholder="Fazer uma busca pela loja">
    </div>

    <main>
        <div id="mensagem-feedback" class="feedback" style="display: none;"></div>

        <article>
            <?php if (empty($produtos)): ?>
                <p style="text-align: center;">Nenhum produto disponível no momento.</p>
            <?php else: ?>

            <?php foreach ($produtos as $p): ?>
                <figure class="produto" data-id="<?= $row['id'] ?>">
                    <img src="<?= htmlspecialchars($p['imagem']) ?>" alt="<?= htmlspecialchars($p['nome']) ?>">
                    <figcaption>
                        <?= htmlspecialchars($p['nome']) ?> <br><br>
                        <strong>R$ <?= number_format($p['preco'], 2, ',', '.') ?></strong>
                        <br><span class="estoque">Disponível: <?= htmlspecialchars($p['quantidade_disponivel']) ?> unidade(s)</span>
                    </figcaption>

                    <div class="botoes">
                        <?php if ($p['quantidade_disponivel'] == 0): ?>
                            <span style="display: block; margin: auto; color: #333;">Produto em falta.</span>
                        <?php else: ?>

                        <button
                            type="button"
                            class="botao comprar"
                            onclick="location.href='carrinho.php?add=<?= $p['id'] ?>'"> Comprar
                        </button>

                        <button
                            type="button"
                            class="botao carrinho"
                            onclick="ajustarCarrinho(<?= $p['id'] ?>, 'adicionar')"> Adicionar ao carrinho
                        </button>
                    </div>
                    <?php endif; ?>
                </figure>
            <?php endforeach; endif; ?>
        </article>
    </main>

    <div id="moedas-container">
        <div class="moeda"><img src="img/_outros/coin.png" alt="Moeda" width="45"></div>
        <div class="moeda"><img src="img/_outros/coin.png" alt="Moeda" width="50"></div>
        <div class="moeda"><img src="img/_outros/coin.png" alt="Moeda" width="60"></div>
        <div class="moeda"><img src="img/_outros/coin.png" alt="Moeda" width="50"></div>
        <div class="moeda"><img src="img/_outros/coin.png" alt="Moeda" width="65"></div>
        <div class="moeda"><img src="img/_outros/coin.png" alt="Moeda" width="50"></div>
        <div class="moeda"><img src="img/_outros/coin.png" alt="Moeda" width="50"></div>
        <div class="moeda"><img src="img/_outros/coin.png" alt="Moeda" width="40"></div>
        <div class="moeda"><img src="img/_outros/coin.png" alt="Moeda" width="50"></div>
        <div class="moeda"><img src="img/_outros/coin.png" alt="Moeda" width="40"></div>
        <div class="moeda"><img src="img/_outros/coin.png" alt="Moeda" width="35"></div>
        <div class="moeda"><img src="img/_outros/coin.png" alt="Moeda" width="40"></div>
        <div class="moeda"><img src="img/_outros/coin.png" alt="Moeda" width="50"></div>
        <div class="moeda"><img src="img/_outros/coin.png" alt="Moeda" width="50"></div>
        <div class="moeda"><img src="img/_outros/coin.png" alt="Moeda" width="70"></div>
    </div>   
</body>
</html>
