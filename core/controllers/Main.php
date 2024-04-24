<?php

namespace core\controllers;

use core\classes\Store;
use core\classes\Database;
use core\models\Clientes;

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

        
      // VALIDAR EMAIL

$bd= new Database();
      $clientes = new Clientes();
       $resultado =  $clientes->Validar_email();




        if ($resultado) {
            die("Email já existe");
        }


        $clientes->registar_cliente();

       
    
            
    }
}

