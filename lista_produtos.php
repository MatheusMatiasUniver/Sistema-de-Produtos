<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <nav class="bg-blue-500 text-white py-4">
        <div class="container mx-auto">
            <ul class="flex justify-center flex-wrap">
                <li class="mx-4 my-2"><a href="lista_produtos.php" class="hover:text-gray-300">Lista de Produtos</a></li>
                <li class="mx-4 my-2"><a href="cadastro_produtos_front.php" class="hover:text-gray-300">Cadastro de Produtos</a></li>
                <li class="mx-4 my-2"><a href="cadastro_fornecedores.html" class="hover:text-gray-300">Cadastro de Fornecedores</a></li>
                <li class="mx-4 my-2"><a href="lista_fornecedores.php" class="hover:text-gray-300">Lista de Fornecedores</a></li>
                <li class="mx-4 my-2"><a href="carrinho_compras.html" class="hover:text-gray-300">Carrinho de Compras</a></li>
            </ul>
        </div>
    </nav>
    <div class="container mx-auto py-8">
        <h2 class="text-2xl font-bold mb-4">Lista de Produtos</h2>
        <form id="form-adicionar-carrinho">
            <ul id="lista-produtos" class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">

            </ul>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4">Adicionar ao Carrinho</button>
        </form>
    </div>
    <script src="lista_produtos.js"></script>
</body>

</html>
