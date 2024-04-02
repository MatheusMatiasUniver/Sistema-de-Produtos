<?php
require_once 'conexao.php';

$query = "SELECT id, nome FROM fornecedores";
$exec = $db->prepare($query);
$exec->execute();
$fornecedores = $exec->fetchAll(PDO::FETCH_ASSOC);
print_r($fornecedores);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    $fornecedor_id = $_POST["fornecedor_id"];

    $query = "INSERT INTO produtos (nome, preco, fornecedor_id) VALUES (:nome, :preco, :fornecedor_id)";
    $exec = $db->prepare($query);
    $exec->bindParam(':nome', $nome);
    $exec->bindParam(':preco', $preco);
    $exec->bindParam(':fornecedor_id', $fornecedor_id);

    if ($exec->execute()) {
        echo "<script>alert('Produto cadastrado com sucesso.');</script>";
        header("Location: lista_produtos.php");
        exit();
    } else {
        echo "Erro ao cadastrar o produto.";
    }
}
?>
