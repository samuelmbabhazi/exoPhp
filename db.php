<?php
 $ini = parse_ini_file('config.ini');
class Database {
    private static $instance = null;
    private $connection;


    private function __construct() {
        global $ini;

        $servername=$ini['servername'];
        $username=$ini['username'];
        $password=$ini['password'];
        $database=$ini['database'];
        $this->connection = new mysqli($servername,$username,$password,$database);;
       
        if ($this->connection->connect_error) {
                die("Connection failed:" .$connection->connect_error);
        } 
    
    
    }



    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }
}
$db=Database::getInstance()
?>