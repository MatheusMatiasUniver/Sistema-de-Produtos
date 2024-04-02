<?php
session_start();

$postData = json_decode(file_get_contents('php://input'), true); // Obter os dados POST em formato JSON
if (!isset($postData['produtos_selecionados']) || !is_array($postData['produtos_selecionados'])) {
    http_response_code(400);
    echo "Produtos não fornecidos ou em formato inválido.";
    exit();
}

if (!isset($_SESSION['carrinho_compras'])) {
    $_SESSION['carrinho_compras'] = [];
}

foreach ($postData['produtos_selecionados'] as $produtoId) {
    if (!in_array($produtoId, $_SESSION['carrinho_compras'])) {
        $_SESSION['carrinho_compras'][] = $produtoId;
    }
}

echo "Produtos adicionados ao carrinho com sucesso!";
?>
