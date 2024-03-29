<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produtoId'])) {
    $produtoId = $_POST['produtoId'];

    foreach ($_SESSION['cesta_compras'] as $index => $produto) {
        if ($produto['id'] == $produtoId) {
            unset($_SESSION['cesta_compras'][$index]);
            break;
        }
    }

    $_SESSION['cesta_compras'] = array_values($_SESSION['cesta_compras']);
}

header('Content-Type: application/json');
echo json_encode(['success' => true, 'message' => 'Produto removido do carrinho com sucesso!']);
?>
