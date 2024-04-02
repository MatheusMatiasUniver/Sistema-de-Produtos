<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Fornecedores</title>
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
    <div class="container mx-auto mt-5">
        <div class="flex justify-center">
            <div class="w-full md:w-1/2">
                <div class="border-double border-4 border-black rounded-lg shadow-md">
                    <div class="p-4 border-b">
                        <h1 class="font-bold">Lista de Fornecedores</h1>
                    </div>
                    <div class="p-4">
                        <ul id="lista-fornecedores" class="space-y-2">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="lista_fornecedores.js"></script>
</body>
</html>