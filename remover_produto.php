<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['produto_id'])) {
    require_once 'conexao.php';
    $produtoId = $_POST['produto_id'];

    $query = "DELETE FROM produtos WHERE id = :produto_id";
    $exec = $db->prepare($query);
    $exec->bindParam(':produto_id', $produtoId);

    if ($exec->execute()) {
        echo json_encode(['success' => true, 'message' => 'Produto removido com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao remover o produto.']);
    }
}
?>