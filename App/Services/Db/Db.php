<?php 

namespace App\Services\Db;

class Db 
{ 
    private static $instance; 

    /** @var \PDO */
    private $pdo; 

    private function __construct()
    { 
        $dbOptions = (require APPLICATION_PATH . '/db_settings.php')['db']; 

        $this->pdo = new \PDO( 
            'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'], 
            $dbOptions['user'], 
            $dbOptions['password'], 
        ); 
        $this->pdo->exec('SET NAMES UTF8');
    }

    public function query(string $sql, $params = []): ?array
    { 
        $sth = $this->pdo->prepare($sql); 
        $result = $sth->execute($params); 

        if (false === $result){ 
            return null; 
        }
        return $sth->fetchAll(); 
    }

    public static function getInstance() :self 
    { 
        if(self::$instance === null){ 
            self::$instance = new self(); 
        }

        return self::$instance; 
    }
}



