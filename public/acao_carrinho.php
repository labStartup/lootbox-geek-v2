<?php
    session_start();
    include_once '../src/config.php';

    header('Content-Type: application/json');

    // Identifica ação e ID do produto
    if (isset($_GET['add'])) {
        $id   = intval($_GET['add']);
        $acao = 'add';
    }
    elseif (isset($_GET['remove'])) {
        $id = intval($_GET['remove']);
        $acao = 'remove';
    }
    else {
        http_response_code(400);
        echo json_encode(['error' => 'Ação inválida']);
        exit;
    }

    // Busca o estoque real no banco
    $stmt = $conn->prepare("SELECT quantidade FROM produtos WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($estoqueReal);
    $stmt->fetch();
    $stmt->close();

    // Quantidade atual no carrinho
    $qtdNoCarrinho = $_SESSION['carrinho'][$id] ?? 0;
    $adicionado = false;

    // Lógica de adicionar ou remover com checagem de estoque
    if ($acao === 'add') {
        if ($qtdNoCarrinho < $estoqueReal) {
            $_SESSION['carrinho'][$id] = $qtdNoCarrinho + 1;
            $qtdNoCarrinho++;
            $adicionado = true;
        }
    }
    else { // remove
        if ($qtdNoCarrinho > 0) {
            $_SESSION['carrinho'][$id] = $qtdNoCarrinho - 1;
            $qtdNoCarrinho--;
            if ($_SESSION['carrinho'][$id] < 1) {
                unset($_SESSION['carrinho'][$id]);
            }
            $adicionado = true;
        }
    }

    // Calcula total geral do carrinho
    $totalCarrinho = array_sum($_SESSION['carrinho'] ?? []);

    // Estoque restante após a operação
    $estoqueRestante = max(0, $estoqueReal - $qtdNoCarrinho);

    // Retorna JSON com status e dados para o JS
    echo json_encode([
        'total'           => $totalCarrinho,
        'produto_id'      => $id,
        'adicionado'      => $adicionado,
        'estoqueRestante' => $estoqueRestante
    ]);
    
    exit;
?>
