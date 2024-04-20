<?php

namespace core\controllers;

use core\classes\Store;
use core\classes\Database;

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
        // Vamos agora verificar se o utilizador existe
        if (Store::clienteLogado()) {
            $this->index();
            return;
        }
        // Alguém pode querer entrar de forma forçada
        // colocando endereço no browser, não seguindo a sequência
        // do programa
        // Verifica se houve submissão de um formulário
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $this->index();
            return;
        }
        // Criacao de um novo cliente
        // 1 - Verificar se a password 1 coincide com password 2
        if ($_POST['text_senha_1'] != $_POST['text_senha_2']) 
        {
            // As oasswirds sao diferentes
            $_SESSION['erro'] = "As passwords não coincidem";
            $this->novo_cliente();
            return;
        }

        // 2 - Verificar se o email já existe
        // e criado o namespace da database
        // paramaetro por exemplo :email podia ser e: PDO
        // este metodo evita SQLInjection

        $bd = new Database;
        $parametros = [
            ':email' => strtolower(trim($_POST['text_email']))
        ];
        $resultados = $bd->select(
            "SELECT * FROM cliente where email = :email", $parametros);

        if (count($resultados) > 0) {
            die("Email já existe");
        }
        // Se o cliente ja existe
        if (count($resultados) > 0) {
            $_SESSION['erro'] = "Email já existe";
            $this->novo_cliente();
            return;
        }
        /* 3 - Registro do cliente
        criar um purl
        guardar os dados na tabela cliente
        eviar um email com o purl para o cliente
        apresentar uma mensagem indicando que deve validar o seu email
        */
        
    
            
    }
}

