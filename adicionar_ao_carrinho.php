<?php
session_start();

if (!isset($_SESSION['cesta_compras'])) {
    $_SESSION['cesta_compras'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produtos = json_decode($_POST['produtos'], true);
    foreach ($produtos as $produto) {
        $_SESSION['cesta_compras'][] = $produto;
    }
}

header('Content-Type: application/json');
echo json_encode(['success' => true, 'message' => 'Produto adicionado ao carrinho com sucesso!']);
?>
