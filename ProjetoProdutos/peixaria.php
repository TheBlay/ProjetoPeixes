
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peixaria</title>
</head>

<body>
    <?php  include_once 'header.php'; 
?>
<hr/><div class='title'>Registro de Peixes</div>
	<div class="caixa">
            <input id="nome" name="nome" placeholder="Nome">
            <button onclick="cadastrarPeixe()">Adicionar Peixe</button>
            <button onclick="carregarPeixes()">Atualizar Peixes</button>
            
    </div>
    <div class="caixa lista" id="listaPeixes"></div>

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
                    '<ul>' + peixes.map(p => `<li>${p.nome}</li>`).join('') + '</ul>';
                })
                .catch(error => console.error('Erro:', error));

                
        }
        
        function carregarPeixes() {
            fetch('peixes.php', { method: 'GET' })
                .then(response => response.json())
                .then(peixes => {
                    document.getElementById('listaPeixes').innerHTML =
                    '<ul>' + peixes.map(p => `<li>${p.nome}</li>`).join('') + '</ul>';
                })
                .catch(error => console.error('Erro ao carregar:', error));
        }

        window.onload = function() {
            carregarPeixes();
        };
</script>
</body>
</html>