function carregarFornecedores() {
  var xhr = new XMLHttpRequest();
  xhr.open("GET", "obter_fornecedores.php", true);
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        var fornecedores = JSON.parse(xhr.responseText);
        var listaFornecedores = document.getElementById("lista-fornecedores");
        listaFornecedores.innerHTML = "";
        fornecedores.forEach(function (fornecedor) {
          var li = document.createElement("li");
          li.className = "flex justify-between items-center py-2 bg-white rounded-md shadow-md px-4";
          li.innerHTML = "<span class='text-gray-900'>" + fornecedor.nome + ": " + fornecedor.contato + "</span>";
          var button = document.createElement("button");
          button.className = "px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 remover-fornecedor";
          button.setAttribute("data-id", fornecedor.id);
          button.textContent = "Remover";
          li.appendChild(button);
          listaFornecedores.appendChild(li);
        });
      } else {
        alert("Erro ao carregar fornecedores.");
      }
    }
  };
  xhr.send();
}

function removerFornecedor(fornecedorId) {
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "remover_fornecedor.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
      if (xhr.status === 200) {
        var response = JSON.parse(xhr.responseText);
        if (response.success) {
          alert(response.message);
          carregarFornecedores();
        } else {
          alert("Erro ao remover o fornecedor.");
        }
      } else {
        alert("Erro ao remover o fornecedor.");
      }
    }
  };
  xhr.send("fornecedor_id=" + encodeURIComponent(fornecedorId));
}

document.addEventListener("DOMContentLoaded", function () {
  carregarFornecedores();

  document.addEventListener("click", function (event) {
    if (event.target && event.target.classList.contains("remover-fornecedor")) {
      var fornecedorId = event.target.getAttribute("data-id");
      if (confirm("Tem certeza de que deseja remover este fornecedor?")) {
        removerFornecedor(fornecedorId);
      }
    }
  });
});
