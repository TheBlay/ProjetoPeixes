
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Filmes</title>
</head>

<body><?php  include_once 'header.php' ?><hr/>
    <div class='title'>Filmes</div>
        <div class="caixa">
                <label for="nome">Nome do Filme</label>
            <input id="nome" name="nome" placeholder="Nome do filme" required>
                <label for="descricao">Descrição do Filme</label>
            <textarea rows="2" cols="50" id="descricao" name="descricao" placeholder="Descrição do Filme" required></textarea>
                <label for="genero">Gênero do Filme</label>
            
            <select name="genero" id="genero" required>
                <option value="">Gênero...</option>
                <option value="terror">Terror</option>
                <option value="ficcao">Ficção Científica</option>
                <option value="romance">Romance</option>
                <option value="drama">Drama</option>
                <option value="comedia">Comédia</option>
                <option value="aventura">Aventura</option>
                <option value="acao">Ação</option>
            </select>
            
            <button type="button" onclick="cadastrarFilme()">Cadastrar Filme</button>
            <button type="button" onclick="carregarFilmes()">Exibir Filmes</button>
        </div>
        <div class="caixa lista" id="listaFilmes">

        </div>
    <script>
    //Componentes


    //Elementos
    
   
    lista = document.getElementById('listaFilmes');

    function cadastrarFilme()
    {
        const generoSelect = document.getElementById('genero');
        
        const nome = document.getElementById('nome').value;
        const descricao = document.getElementById('descricao').value;
        const genero = generoSelect.selectedOptions[0].text;

        const body = new URLSearchParams(
            {
                nome: nome,
                descricao: descricao,
                genero: genero
            }
        );
        fetch('filmes.php',
         {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded'},
            body: body.toString()
    })
    .then(response => response.json())
    .then(filme => {
            document.getElementById('listaFilmes').innerHTML =
                filme.map(f =>
                    `<div class="elemento">
                    <h2>${f.nome}</h2> <br>
                    Descrição: ${f.descricao} <br>
                    Gênero: ${f.genero}</div> <hr/>
                `).join('');
    })
    .catch(error => console.error('Erro: ', error));
    }

    

    function carregarFilmes(){
        
        fetch('filmes.php', { method: 'GET'})
            .then(response => response.json())
            .then(filme => {
                document.getElementById('listaFilmes').innerHTML =
                filme.map(f =>
                    `<div class="elemento">
                    <h2>${f.nome}</h2> <br>
                    Descrição: ${f.descricao} <br>
                    Gênero: ${f.genero}</div> <hr/>
                `).join('');
                
                
            })
            .catch(error => console.error('Erro: ', error));
    }

    window.onload = function() {
        carregarFilmes();
    }
</script>
</body>
</html>