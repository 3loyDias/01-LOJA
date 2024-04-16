<?php
// abrir a sessão, por aqui, vai ficar disponivel para todos os ficheiros
// que fazem parte da nossa aplicação

use core\classes\Database;
use core\classes\Store;

session_start();
//carregar o config,repara que o index.php,está dentro do public
//e eu estou a ir buscar o config.php,ao diretórioanterior ../

require_once('../vendor/autoload.php');
require_once('../core/rotas.php');


