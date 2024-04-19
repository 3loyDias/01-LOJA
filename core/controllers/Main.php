<?php

namespace core\controllers;

use core\classes\Store;

class Main
{
    //================================= Index =================================
    public function index()
    {

        //apresenta a pagina inicial
        Store::
            Layout([
                'layouts/html_header',
                'layouts/header',
                'inicio',
                'layouts/footer',
                'layouts/html_footer',
            ]);

    }

    //================================= Loja =================================
    public function loja()
    {
        //apresenta a pagina da loja
        Store::
            Layout([
                'layouts/html_header',
                'layouts/header',
                'loja',
                'layouts/footer',
                'layouts/html_footer',
            ]);

    }
    //================================= Carrinho =================================
    public function carrinho()
    {
        //apresenta a pagina do carrinho
        Store::
            Layout([
                'layouts/html_header',
                'layouts/header',
                'carrinho',
                'layouts/footer',
                'layouts/html_footer',
            ]);
    }
    //================================== CLIENTES =================================
    //================================================================================
    //================================= Novo Cliente =================================
    public function novo_cliente()
    {
        //Verifica se o cliente está logado
        if (Store::clienteLogado()) {
            $this->index();
            return;
        }
        //apresenta a pagina do carrinho
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'criar_cliente',
            'layouts/footer',
            'layouts/html_footer',
        ]);
    }
    //================================= Criar Cliente =================================
    public function criar_cliente()
    {
        echo '<pre>';
        print_r($_POST);
        // Alguém pode querer entrar de forma forçada
        // colocando endereço no browser, não seguindo a sequência
        // do programa
        // Verifica se houve submissão de um formulário
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->index();
            return;
        }
        echo 'OK';
    }
}

