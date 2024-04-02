<?php
class User {
    private $db;
    public function __construct($db) {
        $this->db = $db;}

    public function createUser($username, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO usuarios (nome, senha) VALUES (:username, :password)";
        $exec = $this->db->prepare($query);
        $exec->bindParam(':username', $username);
        $exec->bindParam(':password', $hashedPassword);
        return $exec->execute();}

    public function getUserById($id) {
        $query = "SELECT * FROM usuarios WHERE id_usuario = :id";
        $exec = $this->db->prepare($query);
        $exec->bindParam(':id', $id);
        $exec->execute();
        return $exec->fetch(PDO::FETCH_ASSOC);}
}
?>