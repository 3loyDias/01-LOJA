<?php

namespace core\controllers;

use core\classes\Store;
use core\classes\Database;
use core\models\Clientes;
use core\classes\EnviarEmail;

class Main
{
    //================================= Index =================================
    public function index()
    {
        $email = new EnviarEmail();
        $email->enviar_email_confirmacao_novo_cliente($email_cliente);


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

    public function login()
    {
        //Verifica se o cliente está logado
        if (Store::clienteLogado()) {
            $this->index();
            return;
        }
        Store::Layout([
            'layouts/html_header',
            'layouts/header',
            'login',
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
        if ($_POST['text_senha_1'] != $_POST['text_senha_2']) {
            // As oasswirds sao diferentes
            $_SESSION['erro'] = "As passwords não coincidem";
            $this->novo_cliente();
            return;
        }

        // 2 - Verificar se o email já existe
        // e criado o namespace da database
        // paramaetro por exemplo :email podia ser e: PDO
        // este metodo evita SQLInjection

        $cliente = new Clientes();
        if ($cliente->verificar_email_registro()) {
            $_SESSION['erro'] = "Email já existe";
            $this->novo_cliente();
            return;
        }

        //***********************************************************
        // Cliente pronto para ser inserido na bd
        // Assim vai dvolver o valor do purl
        $purl = $cliente->registar_cliente();

        //***********************************************************

        // criar o link purl para enviar por email
        // link será algo tipo "http://localhost/01-

        // Link será enviado por email, para o cliente, cliente faz o clic, ele 
        // para a rota confirmar_email, vai ver qual o cliente que tem o purl, 
        // o purl será eliminado e o estado ativo passará de 0 para 1, só a 
        // partir daí é que o nosso cliente pode fazer login
        $email_cliente = strtolower(trim($_POST['text_email']));
        $purl = $cliente->registar_cliente();

    }
}
