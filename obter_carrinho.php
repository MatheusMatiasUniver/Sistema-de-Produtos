<?php
session_start();

require 'conexao.php';

if (isset($_SESSION['carrinho_compras']) && count($_SESSION['carrinho_compras']) > 0) {
    $produtosIds = implode(',', $_SESSION['carrinho_compras']);
    $exec = $db->query("SELECT * FROM produtos WHERE id IN ($produtosIds)");
    $produtos = $exec->fetchAll(PDO::FETCH_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($produtos);
} else {
    echo json_encode([]);
}
?>
