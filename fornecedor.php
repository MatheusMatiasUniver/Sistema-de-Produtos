<?php
class Fornecedor {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function cadastrarFornecedor($nome, $contato) {
        $query = "INSERT INTO fornecedores (nome, contato) VALUES (:nome, :contato)";
        $exec = $this->db->prepare($query);
        $exec->bindParam(':nome', $nome);
        $exec->bindParam(':contato', $contato);
        return $exec->execute();
    }
}
?>
