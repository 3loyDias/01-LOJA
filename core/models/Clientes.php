<?php

namespace core\models;
use core\classes\Database;
use core\classes\Store;

class Clientes
{



    public function Validar_email()
    {

/*

 [text_email] => testegmail@gmail.com
    [text_senha_1] => 123
    [text_senha_2] => 123
    [text_nome_completo] => Ivan fsdfdsa
    [text_morada] => fdsfdsfdfds
    [text_cidade] => olhao
    [text_telefone] => 938343227



*/


        $bd = new Database;
        $parametros = [
            ':email' => strtolower(trim($_POST['text_email']))
        ];

        $resultados = $bd->select(
            "SELECT * FROM cliente where email = :email", $parametros);

            if (count($resultados) > 0) {
                return true;
            }
            else{
            
                return false;
            }
    }


    public function registar_cliente()
    {
        $bd = new Database;

       //Cliente pronto para ser inserido na bd
       $purl = store::criarHash();

       $parametros = [
           ':email' => strtolower(trim($_POST['text_email'])),
           ':senha' => password_hash($_POST['text_senha_1'], PASSWORD_DEFAULT),
           ':nome_completo' => trim($_POST['text_nome_completo']),
           ':morada' => trim($_POST['text_morada']),
           ':telefone' => trim($_POST['text_telefone']),
           ':cidade' => trim($_POST['text_cidade']),
           ':purl' => $purl,
           ':ativo' => 0,
       ];
       $bd->insert(
           "INSERT INTO cliente VALUES (0, :email, :senha, :nome_completo, :morada, :telefone, :cidade, :purl, :ativo, NOW(), NOW(), NULL)", $parametros);


       /* 3 - Registro do cliente
       criar um purl
       guardar os dados na tabela cliente
       eviar um email com o purl para o cliente
       apresentar uma mensagem indicando que deve validar o seu email
       */
       
    }
    public function verificar_email_registro()
    {
        // Verfica se ja existe outra conta com o mesmo email
        // Verifica na BD se existe cliente com mesmo email
        // e criado no namespace da database
        // parametro por exemplo :email podia ser e: PDO

        // este metodo evita SQLInjection
        $bd = new Database;
        $parametros = [
            ':email' => strtolower(trim($_POST['text_email']))
        ];
        $resultados = $bd->select("SELECT email FROM cliente WHERE email = :email", $parametros);

        //se o cliente ja existe
        if (count($resultados) != 0) {
            $_SESSION["erro"] = "Ja existe um Cliente com Esse EMAIL";
            $this->novo_cliente();
            return;
        
    }



}}