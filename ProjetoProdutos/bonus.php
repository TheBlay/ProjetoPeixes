<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filmes</title>
</head>

<body>
      <?php  include_once 'header.php'; 
?>
<hr/><div class='title'>Registro de Filme</div>
	<div class="caixa">
            <form>
                <label for="nome">Título do Filme</label><br>
    <input type="text" id="nome"
    style="width:90%; font-size:16px" placeholder="Nome" required>

    <label for="genero">Gênero</label><br>
    <input type="text" id="genero"
    style="width:90%; font-size:16px" placeholder="Genero" required>

    <input type="submit" value="Adicionar">

            </form>
    </div>
    



    <script>
        /*
    <label for="nome">Título do Filme</label>
    <input type="text" id="nome"
    style="width:90%; font-size:16px" placeholder="Nome">
    <label for="genero">Gênero</label>
    <input type="text" id="genero"
    style="width:90%; font-size:16px" placeholder="Genero">

    <button onclick="cadastrarFilme()">Adicionar</button>
                */
        /*
        const nome = document.getElementById('nome').value;
        const genero = document.getElementById('genero').value;

        const body = new URLSearchParams({ nome: nome, genero: genero});
        fetch('bonusRequest.php',
            {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: body.toString()
            }
        )
        .then(response => response = response.json())
        .then(filme => {
            document.getElementById('list').innerHTML =
            filme.map
        })
            */
    </script>
</body>