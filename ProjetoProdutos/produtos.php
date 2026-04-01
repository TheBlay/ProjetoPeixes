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
  

?>