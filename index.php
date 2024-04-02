<?php
session_start();

require_once 'conexao.php';
require_once 'create_database.php';

if (isset($_SESSION['logged_in'])) {
    header("Location: pagina_principal.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto flex flex-col justify-center items-center h-screen">
        <h1 class="text-3xl font-bold mb-8 text-blue-500">Bem-vindo ao Sistema de Gestão de Produtos</h1>
        <div class="mb-4">
            <a href="login.html" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded inline-block">Fazer login</a>
        </div>
        <div>
            <a href="cadastro_usuarios.html" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded inline-block">Criar cadastro</a>
        </div>
    </div>
</body>

</html>
