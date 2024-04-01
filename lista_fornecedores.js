function carregarFornecedores() {
  $.ajax({
    url: "obter_fornecedores.php",
    type: "GET",
    dataType: "json",
    success: function (fornecedores) {
      $("#lista-fornecedores").empty();
      fornecedores.forEach(function (fornecedor) {
        $("#lista-fornecedores").append(
          `<li class="flex justify-between items-center py-2 bg-white rounded-md shadow-md px-4">
            <span class="text-gray-900">${fornecedor.nome}: ${fornecedor.contato}</span>
            <button class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 remover-fornecedor" data-id="${fornecedor.id}">Remover</button>
          </li>`
        );
      });
    },
    error: function () {
      alert("Erro ao carregar fornecedores.");
    },
  });
}

function removerFornecedor(fornecedorId) {
  $.ajax({
    url: "remover_fornecedor.php",
    type: "POST",
    dataType: "json",
    data: { fornecedor_id: fornecedorId },
    success: function (response) {
      if (response.success) {
        alert(response.message);
        carregarFornecedores();
      } else {
        alert("Erro ao remover o fornecedor.");
      }
    },
    error: function () {
      alert("Erro ao remover o fornecedor.");
    },
  });
}

$(document).ready(function () {
  carregarFornecedores();

  $(document).on("click", ".remover-fornecedor", function () {
    var fornecedorId = $(this).data("id");
    if (confirm("Tem certeza de que deseja remover este fornecedor?")) {
      removerFornecedor(fornecedorId);
    }
  });
});
