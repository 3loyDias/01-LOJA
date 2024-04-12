<?php
// Vai perceber o que vem na query string do meu site
// Colecao de Rotas
// Neste exemplo quando for encontrada a
// acao inicio vou carregar o controlador main e executar o seu metodo index
// sempre que quiser adicionar novas localizacoes, coloca,
$rotas = [
    'inicio' => 'main@index',
    'loja' => 'main@loja',
];

// Agora vamos definir uma acao por defeito
// que vai definir o nosso fluxo de codigo
// e que vai ter o primeiro valor como sendo inicio
// quando nao for enviado nenhum valor vai para inicio

$acao = 'inicio';

// Verifique se a acao na query string
if (isset($_GET['a'])) {
    // Verifique se a acao existe nas rotas
    if (!key_exists($rotas, $_GET['a'])) {
        $acao = 'inicio';
    } else {
        $acao = $_GET['a'];
    }
}

// trata a definicao da rota
// repara que o separador e o @ e o explode vai dividir a string
// secando neste caso main@index o main e o index 
$partes = explode('@', $rotas[$acao]);

