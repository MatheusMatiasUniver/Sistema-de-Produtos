<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["username"]) && isset($_POST["password"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $db = new PDO("mysql:host=localhost;dbname=sistema", "root", "");
        $query = "SELECT id, senha FROM usuarios WHERE username = :username";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['senha'])) {
            $_SESSION["user_id"] = $user['id'];
            header("Location: lista_produtos.php");
            exit();
        } else {echo "Usuário ou senha incorretos.";}
    } else { echo "Por favor, forneça usuário e senha.";}
}
?>
