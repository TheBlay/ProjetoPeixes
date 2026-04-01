<?php  include_once 'header.php'; 

session_status() === PHP_SESSION_NONE ? session_start() : null;




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peixaria</title>
</head>
<script>
    
     function cadastrarPeixe()
        {
            const nome = document.getElementById('nome').value;

            const body = new URLSearchParams({
                nome: nome
            });

            fetch('peixes.php', 
            {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: body.toString()
            })
                .then(response => response.json())
                .then(peixes => {
                    document.getElementById('listaPeixes').innerHTML = 
                    peixes.map(p => '<li>${p.nome}</li>').join('');
                })
                .catch(error => console.error('Erro:', error));

                
        }
</script>
<body>
<hr/><div class='header'>Registro de Peixes</div><br>
	<div>
            <input id="nome" name="nome" placeholder="Nome">
            <button onclick="cadastrarPeixe()">Adicionar Peixe</button>
            <button onClick="">Atualizar Peixes</button>
            
    </div>
    <hr>
    <div id="listaPeixes"></div>
</body>
</html>