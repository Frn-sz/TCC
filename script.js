
const adicionar = document.getElementById("adicionar");
const codProduto = document.getElementById("codProduto");
const quantidade = document.getElementById("quantidade");
const desconto = document.getElementById("desconto");

adicionar.addEventListener("click", function (event) {
let campo = document.createElement("select");
let campoQuantidade = document.createElement("select");
let campoDesconto = document.createElement("select");

campo.name = "codProduto[]";
campo.name = "razao[]";
campo.placeholder = "CodProduto";
campoQuantidade.placeholder = "Quantidade";
campoDesconto.placeholder = "Desconto";
codProduto.appendChild(campo);
quantidade.appendChild(campoQuantidade);
desconto.appendChild(campoDesconto);

});
