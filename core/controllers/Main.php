<?php

namespace core\controllers;
use core\classes\Store;

class Main
{
    public function index()
    {
        $clientes = ["Jaoa Mascarenhas","Figueirita Malmequer", "Cristi Vai Dai", ];
        
        $dados = [
            'titulo' => 'Este e o titulo da pagina',
            'clientes' => $clientes,
        ]; // Como vamos passar agora isto para o interior dos nossos layouts

        Store::
        Layout([
            'layouts/html_header',
            'pagina_inicial',
            'layouts/html_footer',
        ], $dados);

    }

    public function loja()
    {
        echo "Estou na loja";
    }
}

