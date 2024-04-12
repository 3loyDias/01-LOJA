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

$bd = new Database();
$clientes = $bd->select("SELECT * FROM CLIENTES");
echo '<pre>';
print_r($clientes);







//carregar o config
//carregar classes
//carregar o sistema de rotas, este sistema é que vaidicidir o que é para se fazer
//se é para mostrar loja
//carrinho
//<backoffice class="
