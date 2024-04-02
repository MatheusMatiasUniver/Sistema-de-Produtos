<?php
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $hashed_password = password_hash($password, CRYPT_SHA256);

    $query = "INSERT INTO usuarios (username, senha) VALUES (:username, :senha)";
    $exec = $db->prepare($query);
    $exec->bindParam(':username', $username);
    $exec->bindParam(':senha', $hashed_password);

    if ($exec->execute()) {
        header("Location: login.html");
        exit();
    } else {
        echo "Erro ao cadastrar o usuário.";
    }
}
?>
