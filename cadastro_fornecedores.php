<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $contato = $_POST["contato"];

    $query = "INSERT INTO fornecedores (nome, contato) VALUES (:nome, :contato)";
    $exec = $db->prepare($query);
    $exec->bindParam(':nome', $nome);
    $exec->bindParam(':contato', $contato);

    if ($exec->execute()) {
        echo "<script>alert('Fornecedor cadastrado com sucesso.');</script>";
        header("Location: lista_fornecedores.php");
        exit();
    } else {
        echo "Erro ao cadastrar o fornecedor.";
    }
}
?>