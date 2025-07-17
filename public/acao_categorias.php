<?php
  session_start();
  include '../src/config.php';

  // Pega o carrinho atual da sessão
  $carrinho = $_SESSION['carrinho'] ?? [];

  // parâmetros de filtro
  $categoriaId  = $_GET['categoria'] ?? null;
  $busca = trim($_GET['q'] ?? '');

  // Monta a consulta básica
  $sql = "
    SELECT p.id,
    p.nome,
    p.preco,
    p.imagem,
    p.quantidade,
    c.nome AS categoria
    FROM produtos p
    LEFT JOIN categorias c ON p.categoria_id = c.id
    WHERE p.ativo = 1";

  // filtra por categoria
  if ($categoriaId) {
    $categoriaId = intval($categoriaId);
    $sql .= " AND p.categoria_id = {$categoriaId}";
  }

  // filtra por busca
  if ($busca !== '') {
    $buscaEsc = $conn->real_escape_string($busca);
    $sql .= " AND p.nome LIKE '%{$buscaEsc}%'";
  }

  $res = $conn->query($sql);

  if ($res && $res->num_rows > 0):
    while ($row = $res->fetch_assoc()):
      $id = $row['id'];
      $qtdNoCarrinho = $carrinho[$id] ?? 0;
      $disp = max(0, $row['quantidade'] - $qtdNoCarrinho);
?>
    <figure class="produto" data-id="<?= $id ?>">
      <img src="<?= htmlspecialchars($row['imagem']) ?>"
           alt="<?= htmlspecialchars($row['nome']) ?>">
      <figcaption>
        <?= htmlspecialchars($row['nome']) ?><br><br>
        <strong>R$ <?= number_format($row['preco'], 2, ',', '.') ?></strong><br>
        <span class="estoque">
          Disponível: <?= $disp ?> unidade(s)
        </span>
      </figcaption>
      <div class="botoes">
        <?php if ($disp > 0): ?>
          <button class="botao comprar"
                  onclick="location.href='carrinho.php?add=<?= $id ?>'">
            Comprar
          </button>
          <button class="botao carrinho"
                  onclick="ajustarCarrinho(<?= $id ?>, 'adicionar')">
            Adicionar ao carrinho
          </button>
        <?php else: ?>
          <span class="sem-estoque">Produto em falta.</span>
        <?php endif; ?>
      </div>
    </figure>
<?php
  endwhile;
else:
  // feedback quando nada é encontrado
  $textoBusca = $busca !== ''
    ? ' para “<strong>' . htmlspecialchars($busca) . '</strong>”'
    : '';
  echo "
    <div style='margin: 4em; width: max-content; text-align: left; color: black; font-size: 1.6em; z-index: 100;'>
      <strong>Ops... nenhum produto encontrado ou cadastrado {$textoBusca}.</strong>
    </div>
  ";
endif;
?>
