<?php
session_start();
require 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['produto_id'])) {
    $produtoId = $_POST['produto_id'];
    
    if (isset($_SESSION['carrinho_compras']) && in_array($produtoId, $_SESSION['carrinho_compras'])) {
        $key = array_search($produtoId, $_SESSION['carrinho_compras']);
        unset($_SESSION['carrinho_compras'][$key]);
        echo "Produto removido com sucesso!";
    } else {
        echo "Produto não encontrado.";
    }
}
?>
