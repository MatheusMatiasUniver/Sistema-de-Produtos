<?php
require 'conexao.php';

try {
    $sql_fornecedores = "
    CREATE TABLE IF NOT EXISTS `fornecedores` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `nome` varchar(100) NOT NULL,
      `contato` varchar(100) DEFAULT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ";

    $sql_produtos = "
    CREATE TABLE IF NOT EXISTS `produtos` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `nome` varchar(100) NOT NULL,
      `preco` decimal(10,2) NOT NULL,
      `fornecedor_id` int(11) DEFAULT NULL,
      PRIMARY KEY (`id`),
      KEY `fornecedor_id` (`fornecedor_id`),
      CONSTRAINT `fk_fornecedor` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedores` (`id`) ON DELETE SET NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ";

    $sql_usuarios = "
    CREATE TABLE IF NOT EXISTS `usuarios` (
      `id` int(11) NOT NULL AUTO_INCREMENT,
      `username` varchar(50) NOT NULL,
      `senha` varchar(255) NOT NULL,
      PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ";

    $db->exec($sql_fornecedores);
    $db->exec($sql_produtos);
    $db->exec($sql_usuarios);

} catch (PDOException $e) {
    die("Erro ao criar as tabelas: " . $e->getMessage());
}
?>
