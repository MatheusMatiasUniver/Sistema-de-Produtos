function carregarCestaCompras() {
    fetch('obter_cesta_compras.php')
        .then(response => response.json())
        .then(produtos => {
            jQuery('#cesta-compras').empty();
            produtos.forEach(produto => {
                const produtoItem = jQuery(`<li class="flex items-center">
                                            <div class="font-semibold mr-2">${produto.nome}:</div>
                                            <div class="text-green-500 font-semibold mr-2">${produto.preco}</div>
                                            <span class="text-gray-500">(Fornecedor: ${produto.nome_fornecedor} )</span>
                                            <button onclick="removerDoCarrinho(${produto.id})">Remover do Carrinho</button>
                                        </li>`);
                jQuery('#cesta-compras').append(produtoItem);
            });
        })
        .catch(error => console.error('Erro ao carregar cesta de compras:', error));
}

function removerDoCarrinho(produtoId) {
    fetch('remover_do_carrinho.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'produtoId=' + produtoId,
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(data.message);
            carregarCestaCompras();
        } else {
            alert('Erro ao remover produto do carrinho.');
        }
    })
    .catch(error => console.error('Erro ao remover produto do carrinho:', error));
}

jQuery(document).ready(function () {
    carregarCestaCompras();
});
