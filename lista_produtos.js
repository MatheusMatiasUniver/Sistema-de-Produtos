document.addEventListener('DOMContentLoaded', function () {
    // Função para carregar a lista de produtos
    function carregarLista() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'obter_produtos.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var data = JSON.parse(xhr.responseText);
                    var listaProdutos = document.getElementById('lista-produtos');
                    listaProdutos.innerHTML = '';
                    data.forEach(function (produto) {
                        var listItem = document.createElement('li');
                        listItem.className = 'bg-white shadow-md rounded-lg p-4';
                        var checkbox = document.createElement('input');
                        checkbox.type = 'checkbox';
                        checkbox.className = 'produto_checkbox mr-2';
                        checkbox.name = 'produtos[]';
                        checkbox.value = produto.id;
                        checkbox.setAttribute('data-produto-id', produto.id);
                        var label = document.createElement('label');
                        label.setAttribute('for', 'produto-' + produto.id);
                        label.textContent = produto.nome + ' - R$' + parseFloat(produto.preco).toFixed(2);
                        var removerButton = document.createElement('button');
                        removerButton.type = 'button';
                        removerButton.className = 'remover-produto bg-red-500 text-white px-4 py-2 rounded-md ml-4';
                        removerButton.setAttribute('data-id', produto.id);
                        removerButton.textContent = 'Remover';
                        listItem.appendChild(checkbox);
                        listItem.appendChild(label);
                        listItem.appendChild(removerButton);
                        listaProdutos.appendChild(listItem);
                    });
                } else {
                    alert('Erro ao carregar produtos.');
                }
            }
        };
        xhr.send();
    }

    // Função para remover o produto
    function removerProduto(produtoId) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'remover_produto.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert(response.message);
                        carregarLista(); // Recarregar a lista após a remoção
                    } else {
                        alert('Erro ao remover o produto.');
                    }
                } else {
                    alert('Erro ao remover o produto.');
                }
            }
        };
        xhr.send('produto_id=' + encodeURIComponent(produtoId));
    }

    // Carregar lista de produtos ao carregar a página
    carregarLista();

    // Tratar o clique no botão de remoção de produtos
    document.addEventListener('click', function (event) {
        if (event.target && event.target.classList.contains('remover-produto')) {
            var produtoId = event.target.getAttribute('data-id');
            removerProduto(produtoId);
        }
    });

    // Submeter o formulário para adicionar produtos ao carrinho
    document.getElementById('form-adicionar-carrinho').addEventListener('submit', function(event) {
        event.preventDefault(); // Impedir o envio do formulário

        var produtosSelecionados = Array.from(document.querySelectorAll('input[name="produtos[]"]:checked')).map(function(checkbox) {
            return checkbox.value;
        });

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'adicionar_ao_carrinho.php', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    alert(xhr.responseText); // Exibir mensagem de sucesso
                } else {
                    alert('Erro ao adicionar produtos ao carrinho: ' + xhr.responseText); // Exibir mensagem de erro
                }
            }
        };
        xhr.send(JSON.stringify({ produtos_selecionados: produtosSelecionados }));
    });
});