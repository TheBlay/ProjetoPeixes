<html>
<head>
    <link rel="stylesheet" href="style.css">
    
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Produtos</title>
</head>
<?php
require_once 'produtos.php';
//PHP_SESSION_DISABLED if sessions are disabled. PHP_SESSION_NONE if sessions are enabled, but none exists. PHP_SESSION_ACTIVE if sessions are enabled, and one exists.
session_status() === PHP_SESSION_NONE ? session_start() : null;
$_SESSION['produtos'] = $produtos;
?>
<script>
	function getProdutos(){
        const value = document.getElementById('numeroField').value;

                
                fetch('produtos.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'data=' + encodeURIComponent(value)
                })
                .then(response => response.text())
                .then(
                    document.getElementById('listaProdutos').innerHTML = ' ' + response
)
                .catch(error => console.error('Error:', error));

        }

         function cadastrarProduto()
        {
             nome = document.getElementById('nome').value;
             descricao = document.getElementById('descricao').value;
             preco = document.getElementById('preco').value;

             body = new URLSearchParams({
                nome: nome,
                descricao: descricao,
                preco: preco
            });
            fetch('produtos.php', 
            {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: body.toString()
                })
                .then(response => response.text())
                .then(result => {
                    // Atualiza o conteúdo da div com a lista atualizada
                    document.getElementById('listaProdutos').innerHTML = ' ' + result;
                })
                .catch(error => console.error('Erro:', error));

                
        }


</script>

<body>
<?php  include_once 'header.php' ?>
<hr/><div class='header'>Produtos</div><br>
	<div>
            <input id="nome" name="nome" placeholder="Nome">
            <input id="descricao" name="descricao" placeholder="Descrição">
            <input id="preco" name="preco" type="number" step="0.01" placeholder="Preço">
            <button onclick="cadastrarProduto()">Adicionar produto</button>
            
    </div>
	
        <div id="listaProdutos"><?= gerarListaProdutos($produtos) ?></div>

</body>

</html>