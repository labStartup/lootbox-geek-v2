<?php
    session_start();
    include '../src/config.php';

    // Pega o carrinho atual da sessão
    $carrinho = $_SESSION['carrinho'] ?? [];

    // Captura o filtro de categoria, se existir
    $categoriaId = $_GET['categoria'] ?? null;

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
    WHERE p.ativo = 1
    ";

    // Aplica o filtro de categoria, se passado
    if ($categoriaId) {
    $categoriaId = intval($categoriaId);
    $sql .= " AND p.categoria_id = $categoriaId";
    }

    $res = $conn->query($sql);

    if ($res && $res->num_rows > 0):

    while ($row = $res->fetch_assoc()):

        // ID do produto
        $id = $row['id'];

        // Quantidade já reservada no carrinho
        $qtdNoCarrinho = $carrinho[$id] ?? 0;

        // Estoque disponível real (banco - carrinho)
        $row['quantidade_disponivel'] = max(0, $row['quantidade'] - $qtdNoCarrinho);
?>
    <figure class="produto" data-id="<?= $row['id'] ?>">
      <img src="<?= htmlspecialchars($row['imagem']) ?>" alt="<?= htmlspecialchars($row['nome']) ?>">
      <figcaption>
        <?= htmlspecialchars($row['categoria']) ?> –
        <?= htmlspecialchars($row['nome']) ?><br><br>
        <strong>R$ <?= number_format($row['preco'], 2, ',', '.') ?></strong><br>
        <span class="estoque">
          Disponível: <?= htmlspecialchars($row['quantidade_disponivel']) ?> unidade(s)</span>
      </figcaption>
      
      <div class="botoes">
        <?php if ($row['quantidade_disponivel'] > 0): ?>
          <button
            class="botao comprar"
            onclick="location.href='carrinho.php?add=<?= $row['id'] ?>'">
            Comprar
          </button>
          <button
            class="botao carrinho"
            onclick="ajustarCarrinho(<?= $row['id'] ?>, 'adicionar')">
            Adicionar ao carrinho
          </button>
        <?php else: ?>
          <span class="sem-estoque" style="display: block; margin: auto; color: #dfdfdf;">Produto em falta.</span>
        <?php endif; ?>
      </div>
    </figure>
<style>
  
</style>
<?php
  endwhile;

  else:
    echo "<div style='margin: 5em;'>
            <p style='margin: 50% auto, text-align: center;'><strong>Ops... nenhum produto encontrado ou cadastrado nesta categoria.</strong></p>
          </div>";
  endif;
?>
