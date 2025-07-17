<?php
  session_start();
  include_once '../src/config.php';

  if (isset($_SESSION['compra_finalizada'])) {
    echo '<div class="aviso-compra">Agradecemos pela sua compra! 🎉</div>';
    unset($_SESSION['compra_finalizada']);
  }

  // Adicionar produto ao carrinho (GET add)
  if (isset($_GET['add'])) {
      $id = intval($_GET['add']);

      // 1) Busca o estoque real no banco
      $stmt = $conn->prepare("SELECT quantidade FROM produtos WHERE id = ?");
      $stmt->bind_param('i', $id);
      $stmt->execute();
      $stmt->bind_result($estoqueReal);
      $stmt->fetch();
      $stmt->close();

      // 2) Quantidade já no carrinho
      $qtdNoCarrinho = $_SESSION['carrinho'][$id] ?? 0;

      // 3) Só adiciona se ainda houver estoque
      if ($qtdNoCarrinho < $estoqueReal) {
          $_SESSION['carrinho'][$id] = $qtdNoCarrinho + 1;
      } else {
          // Uma simples mensagem de erro de estoque
          $_SESSION['erro_estoque'] = "Estoque insuficiente para adicionar mais unidades.";
      }

      header("Location: carrinho.php");
      exit;
  }

  // Exibe erro de estoque se existir
  if (isset($_SESSION['erro_estoque'])) {
      echo '<div class="aviso-erro">' . $_SESSION['erro_estoque'] . '</div>';
      unset($_SESSION['erro_estoque']);
  }

  // Após “Concluir Compra”
  if (isset($_POST['finalizar'])) {
      foreach ($_SESSION['carrinho'] as $id => $qtd) {
          $stmt = $conn->prepare(
            "UPDATE produtos 
              SET quantidade = quantidade - ? 
            WHERE id = ?"
          );
          $stmt->bind_param('ii', $qtd, $id);
          $stmt->execute();
          $stmt->close();
      }

      unset($_SESSION['carrinho']);
      $_SESSION['compra_finalizada'] = true;
      header('Location: carrinho.php');
      exit;
  }

  // Remover uma unidade do carrinho
  if (isset($_GET['remove'])) {
      $id = intval($_GET['remove']);
      if (!empty($_SESSION['carrinho'][$id])) {
          $_SESSION['carrinho'][$id]--;
          if ($_SESSION['carrinho'][$id] < 1) {
              unset($_SESSION['carrinho'][$id]);
          }
      }
      header("Location: carrinho.php");
      exit;
  }

  // Montar lista de IDs e buscar detalhes no banco
  $carrinho = $_SESSION['carrinho'] ?? [];
  $ids = array_map('intval', array_keys($carrinho));
  $produtosNoCarrinho = [];
  $total = 0.0;

  if (!empty($ids)) {
      $in  = implode(",", $ids);
      $sql = "
      SELECT 
          p.*,
          c.nome AS categoria
      FROM produtos p
      LEFT JOIN categorias c 
          ON p.categoria_id = c.id
      WHERE p.id IN ($in)
      ";
      $res = $conn->query($sql);

    while ($row = $res->fetch_assoc()) {
        //Estoque real no banco
        $estoqueReal = intval($row['quantidade']);

        // Quantidade reservada no carrinho
        $qtd = $carrinho[ $row['id'] ] ?? 0;

        // 3Cálculos de subtotal e total
        $sub = $row['preco'] * $qtd;
        $total += $sub;

        // Prepara o array para exibição
        $row['quantidade'] = $qtd; // p/ “Quantidade:”
        $row['subtotal'] = $sub; // p/ “Subtotal:”
        $row['quantidade_disponivel'] = max(0, $estoqueReal - $qtd);  // p/ “Disponível:”

        $produtosNoCarrinho[] = $row;
    }

  }
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Carrinho de Compras</title>
  <link rel="stylesheet" href="style_carrinho.css" media="all">
  <link rel="shortcut icon" href="./img/_outros/info-perfil.png" type="image/x-icon">
  <script src="script.js" defer></script>
</head>

<body>
  <main>
    <h1>Itens adicionados ao carrinho</h1>

    <?php if (empty($produtosNoCarrinho)): ?>
      <p style="text-align: center;">O carrinho está vazio.</p>
    <?php endif; ?>
    <section class="cart-items">
      <?php foreach ($produtosNoCarrinho as $p): ?>
        <div class="cart-card">
          <img src="<?= htmlspecialchars($p['imagem']) ?>" alt="<?= htmlspecialchars($p['nome']) ?>">

          <div class="cart-info">
            <h2><?= htmlspecialchars($p['nome']) ?></h2>
            <p class="categoria"><?= htmlspecialchars($p['categoria']) ?></p>
            <p>Quantidade: <?= $p['quantidade'] ?></p>
            <p class="estoque">Estoque: <strong><?= htmlspecialchars($p['quantidade_disponivel']) ?></strong></p>
            <p>Unitário: R$ <?= number_format($p['preco'], 2, ',', '.') ?></p>
            <p class="subtotal">Subtotal: R$ <?= number_format($p['subtotal'], 2, ',', '.') ?></p>

            <div class="cart-actions">
              <button title="-1 unidade" class="acao diminuir" onclick="ajustarCarrinho(<?= $p['id'] ?>, 'remover')">–1</button>
              <button title="+1 unidade" class="acao aumentar" onclick="ajustarCarrinho(<?= $p['id'] ?>, 'adicionar')">+1</button>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      <div class="cart-total">
        <span>Total:</span>
        <strong>R$ <?= number_format($total, 2, ',', '.') ?></strong>
      </div>

      <div class="continuar">
        <a href="store.php">← Voltar à loja</a>
        <form method="post" action="carrinho.php">
          <button type="submit" name="finalizar" onclick="msg('Obrigado pela compra!')">Concluir Compra</button>
        </form>
      </div>
    </section>
  </main>
</body>
</html>
