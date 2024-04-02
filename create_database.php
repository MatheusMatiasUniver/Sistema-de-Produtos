<?php
require 'conexao.php';

try {
    $sql_create_db = "CREATE DATABASE IF NOT EXISTS sistema";
    $db->exec($sql_create_db);

    require 'create_tables.php';

} catch (PDOException $e) {
    die("Erro ao criar o banco de dados: " . $e->getMessage());
}
?>
