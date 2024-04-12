<?php
// com o mesmo nome do ficheiro 
namespace core\classes;
class Database
{
    // gestao da base de dados
    


// MYSQL - constantes para ligacao BD
/*define('MYSQL_SERVER', 'localhost');
define('MYSQL_DATABASE', 'php_store');
define('MYSQL_USER', 'root');
define('MYSQL_PASS', '');
define('MYSQL_CHARSET', 'utf8');*/

    private $ligacao;

    private function ligar()
    {
        $this->ligacao = new \PDO(
            'mysql:' .
            'host=' . MYSQL_SERVER . ';' .
            'dbname=' . MYSQL_DATABASE . ';' .
            'charset=' . MYSQL_CHARSET,
            MYSQL_USER,
            MYSQL_PASS,
            array(
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_PERSISTENT => false
            )
        );
        $this->ligacao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

//====================================================================================================
    private function desligar()
    {
        // fechar a ligacao
        $this->ligacao = null;
    }
//====================================================================================================
// Significa que podemos passar parametros ou nao 
    public function select($sql, $parametros = null)
    {
        // Executa funcao de pesquisa de SQL
        $this->ligar();
        // todos os selects vao ter resultados
        $resultado = null;

        try{
            //Comuinicacao com a bd
            if  (!empty($parametros)){
                $executar = $this->ligacao->prepare($sql);
                $executar->execute($parametros);
                $resultado = $executar->fetchAll(\PDO::FETCH_ASSOC);
            }
            else{
                $executar = $this->ligacao->query($sql);
                $executar->execute();
                $resultado = $executar->fetchAll(\PDO::FETCH_ASSOC);
            }
        }
        catch(\PDOException $e){
            return false;
        }
        $this->desligar();
        // devolve o resultado 
        return $resultado;

        $clientes = $bd->select("SELECT * FROM CLIENTES");
        }






}