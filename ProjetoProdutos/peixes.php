<?php
    header('Content-Type: application/json; charset=utf-8');
    $arquivo = 'peixes.json';

    if (!file_exists($arquivo)) {
        file_put_contents($arquivo, json_encode([]));
    }

    $peixes = json_decode(file_get_contents($arquivo), true);
    $nome = trim($_POST['nome'] ?? ''); 

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && $nome !== '') {
        $peixes[] = ["nome" => $nome];
        file_put_contents($arquivo, json_encode($peixes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }

    // Retorna sempre a lista atualizada como JSON (GET ou POST)
    echo json_encode($peixes, JSON_UNESCAPED_UNICODE);
    exit;


// Função para debug ou uso futuro em output HTML (não usada para a resposta JSON)
function gerarListaPeixes($peixes) {
    $html = "<br/><h3>Peixes</h3>";
    foreach ($peixes as $key => $peixe) {
        $html .= "Peixe $key: <br/>";
        $html .= "Nome: " . $peixe["nome"] . "<br/>";
        $html .= "<hr/>";
    }
    return $html;
}



?>