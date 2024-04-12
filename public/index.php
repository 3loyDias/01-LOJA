<?php
// abrir a sessão, por aqui, vai ficar disponivel para todos os ficheiros
// que fazem parte da nossa aplicação

use core\classes\Database;
use core\classes\Functions;

session_start();
//carregar o config,repara que o index.php,está dentro do public
//e eu estou a ir buscar o config.php,ao diretórioanterior ../
require_once('../config.php');
require_once('../vendor/autoload.php');
require_once('../core/rotas.php');

// vamos criar um objeto para ligar a base de dados
$db = new Database();
/*$clientes = $db->select("SELECT * FROM CLIENTES");
echo "<pre>";
echo $clientes[0]->nome . "<br>";
echo $clientes[2]->nome;*/

$clientes = $db->select("SELECT * FROM CLIENTES");
var_dump($clientes);
//carregar o config
//carregar classes
//carregar o sistema de rotas, este sistema é que vaidicidir o que é para se fazer
//se é para mostrar loja
//carrinho  
//<backoffice class="
