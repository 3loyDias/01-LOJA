<?php
namespace core\classes;
use Exception;
class Store
{
   //====================================================================================================
      // Chamamento do nosso layout
      // Static function poque nao quero fazer instanciacao da class 
      // quero fazer executar o metodo dela automaticamente
      //====================================================================================================
   public static function Layout($estructuras, $dados = null )
   {
      // Estruturas sao a colecao de ficheiros (html_header.php .......)
      // seguindo a sequencia de apresentacao
     // html_header.php nav_bar.php inicio.php html_footer.php

     //verifica se estruturas e um array
     if(!is_array($estructuras))
     {
        throw new Exception("Colecao de estruturas invalida");
     }
     //variaveis

     if (!empty($dados) && is_array($dados)) {
        extract($dados);
     }

     //apresentar as views da aplicacao
     //ficheiros que estao colocados dentro das view
     foreach ($estructuras as $estrutura) {
      include("../core/views/$estrutura.php"); // como vou usar extensoes php
     }
      
   }

   public static function clienteLogado()
   {
      //Verifica se temos um cliente logado / em sessao
      // Se existir um cliene na sessao vai devolver true
      return isset($_SESSION['cliente']);
   }
}