<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['fornecedor_id'])) {
    require_once 'conexao.php';
    $fornecedorId = $_POST['fornecedor_id'];

    $query = "DELETE FROM fornecedores WHERE id = :fornecedor_id";
    $exec = $db->prepare($query);
    $exec->bindParam(':fornecedor_id', $fornecedorId);

    if ($exec->execute()) {
        echo json_encode(['success' => true, 'message' => 'Fornecedor removido com sucesso.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Erro ao remover o fornecedor.']);
    }
}
?>
