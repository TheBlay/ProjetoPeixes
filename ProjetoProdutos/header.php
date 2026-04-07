<head>
<link rel="stylesheet" href="style.css">

</head>

<style>
:root {
    --cor-fundo-navbar: #C9B59C;
    --cor-botoes-nav: #DCC5B2;
    --fonte-botoes-nav: "Chango, sans-serif";
    --cor-fonte-botoes-nav: black;
}
.navBarSuperior {
    max-width: 100dvh;
    flex-wrap: wrap;
    height: 70px;
    border-radius:10px;
    font-family: var(--fonte-botoes-nav);
    background-color: var(--cor-fundo-navbar, #D2C4B4);
    justify-content: space-around;
    align-content: space-around;
    display: flex;
    gap: 7em;
    
}
.contain {
    border: 2px solid black;
    flex-wrap: wrap;
    text-decoration: none;
    font-size: 30px;
    height: 70%;
    width: 14%;
    color: var(--cor-fonte-botoes-nav, black);
    background-color: var(--cor-botoes-nav);
    border-radius: 15px;
    justify-content: space-around;
    align-content: space-evenly;
    display: inline-flex;
}

.contain:hover{
    background-color: #dea575;
    text-shadow: #fcfbfa;
}

a:not(.contain) {
  
  margin-block: 1px;
  
}


 </style>

<div class="navBarSuperior">
    <a class="contain" href="index.php" >Home</a>
    <a class="contain" href="peixaria.php" >Peixaria</a>
    <a class="contain" href="filmesFavoritos.php" >Filmes</a>

</div>