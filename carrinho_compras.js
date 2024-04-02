document.addEventListener('DOMContentLoaded', function () {
    function carregarCarrinho() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'obter_carrinho.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var produtos = JSON.parse(xhr.responseText);
                    exibirCarrinho(produtos);
                } else {
                    console.error('Erro ao buscar carrinho: ' + xhr.statusText);
                }
            }
        };
        xhr.send();
    }
  
    function exibirCarrinho(produtos) {
        var carrinhoCompras = document.getElementById('carrinho_compras');
        if (produtos.length > 0) {
            var carrinhoHtml = "<ul class='divide-y divide-gray-200'>";
            var totalProdutos = 0;
            var valorTotal = 0;
  
            produtos.forEach(function (produto) {
                carrinhoHtml += "<li class='flex justify-between items-center py-2'>";
                carrinhoHtml += "<span class='text-gray-900'>" + produto.nome + " - R$" + produto.preco + "</span>";
                carrinhoHtml += "<button class='px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 remover-produto' data-id='" + produto.id + "'>Remover</button>";
                carrinhoHtml += "</li>";
                totalProdutos++;
                valorTotal += parseFloat(produto.preco);
            });
  
            carrinhoHtml += "</ul>";
            carrinhoHtml += "<p class='mt-4'>Total de produtos: <span class='font-bold'>" + totalProdutos + "</span></p>";
            carrinhoHtml += "<p>Valor total: <span class='font-bold'>R$" + valorTotal.toFixed(2) + "</span></p>";
            carrinhoCompras.innerHTML = carrinhoHtml;
        } else {
            carrinhoCompras.innerHTML = "<p>Nenhum produto no carrinho.</p>";
        }
    }
  
    document.getElementById('carrinho_compras').addEventListener('click', function (event) {
        if (event.target && event.target.classList.contains('remover-produto')) {
            var produtoId = event.target.getAttribute('data-id');
            removerProduto(produtoId);
        }
    });
  
    function removerProduto(produtoId) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'remover_do_carrinho.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    carregarCarrinho();
                } else {
                    console.error('Erro ao remover produto do carrinho: ' + xhr.statusText);
                }
            }
        };
        xhr.send('produto_id=' + encodeURIComponent(produtoId));
    }
  
    carregarCarrinho();
  });
  