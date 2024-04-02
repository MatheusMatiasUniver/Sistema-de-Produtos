<?php
require_once 'conexao.php';

$query = "SELECT id, nome, preco FROM produtos";
$exec = $db->query($query);
$produtos = $exec->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($produtos);
?>
