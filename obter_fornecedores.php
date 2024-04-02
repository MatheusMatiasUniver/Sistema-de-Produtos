<?php
require_once 'conexao.php';

$query = "SELECT * FROM fornecedores";
$exec = $db->query($query);
$fornecedores = $exec->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode($fornecedores);
?>
