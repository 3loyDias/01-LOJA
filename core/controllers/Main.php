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
}

