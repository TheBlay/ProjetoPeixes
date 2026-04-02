<?php
session_status() === PHP_SESSION_NONE ? session_start() : null;

if(!isset($produtos)){
    
$produtos = [
    [
        "nome" => "Maçã",
        "descricao" => "Vermelha e redonda",
        "preco" => 4.99
    ],
    [
        "nome" => "Superbond",
        "descricao" => "Grudento",
        "preco" => 9.90
    ]
];

$_SESSION['produtos'] = $produtos;
}

$ultimoIndice = max(array_keys($produtos));

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $preco = floatval($_POST['preco'] ?? 0);

    if ($nome !== '' && $descricao !== '' && $preco > 0) {
        

        $produtos[$ultimoIndice + 1] = [
            "nome" => $nome,
            "descricao" => $descricao,
            "preco" => $preco
        ];
        print_r($produtos);
        echo "<br/> Sessão: " . print_r($_SESSION['produtos']);
        echo gerarListaProdutos($produtos);
        exit; 
    } else {
        echo "Preencha todos os campos corretamente.";
        exit;
    }
}

function gerarListaProdutos($produtos) {
    $html = "<br/><h3>Produtos</h3>";
    foreach ($produtos as $key => $produto) {
        $html .= "Produto $key: <br/>";
        $html .= "Nome: " . $produto["nome"] . "<br/>";
        $html .= "Descrição: " . $produto["descricao"] . "<br/>";
        $html .= "Preço: R$" . number_format($produto["preco"], 2, ',', '.') . "<br/>";
        $html .= "<hr/>";
    }
    return $html;
}


print_r($produtos);
/* TO-DO: 
- Aplicar o .json para os produtos, como foi feito para os peixes, para persistência dos dados.
- Criar uma constante html para a listagem dos produtos, como foi feito para os peixes, para facilitar a renderização da lista no HTML. 
Exemplo:                    mas parecido com a formatação de gerarListaProdutos, para manter a formatação de preço e descrição!
const html = `<ul>${produtos
  .map(p => `<li>${p.id} - ${p.nome} - R$ ${p.preco}</li>`)
  .join('')}</ul>`;

  Por que .map() funciona
map itera cada elemento do array
recebe função que converte o elemento em outra coisa (string/objeto/número)
ideal para renderizar listas mas também para transformar arrays em geral

atualização no window.onload para renderizar a lista de produtos usando a constante html,
 e não mais print_r, para mostrar a formatação correta.
 Melhorar estilo do header, para ficar mais parecido com um menu, e não um bloco de links.

*/

?>