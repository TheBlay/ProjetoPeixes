<?php
session_status() === PHP_SESSION_NONE ? session_start() : null;

header('Content-Type: application/json; charset=utf-8');
    $arquivo = 'produtos.json';

    if (!file_exists($arquivo)) {
        file_put_contents($arquivo, json_encode([]));
    }

    $produtos = json_decode(file_get_contents($arquivo), true);
    
    $nome = trim($_POST['nome'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');
    $preco = floatval($_POST['preco'] ?? 0) ;
if($_SERVER['REQUEST_METHOD'] === 'POST')
{
    if ($nome !== '' && $descricao !== '' && $preco > 0)
    {

        $produtos[] = [
            "nome" => $nome,
            "descricao" => $descricao,
            "preco" => $preco
        ];
        file_put_contents($arquivo, json_encode($produtos, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    } else {
        echo "Preencha todos os campos corretamente.";
        exit;
    }
}
    // Retorna sempre a lista atualizada como JSON (GET ou POST)
    echo json_encode($produtos, JSON_UNESCAPED_UNICODE);
    exit;





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