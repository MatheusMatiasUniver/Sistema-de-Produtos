<?php
class Produto {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function cadastrarProduto($nome, $preco) {
        $query = "INSERT INTO produtos (nome, preco) VALUES (:nome, :preco)";
        $exec = $this->db->prepare($query);
        $exec->bindParam(':nome', $nome);
        $exec->bindParam(':preco', $preco);
        return $exec->execute();
    }
}
?>