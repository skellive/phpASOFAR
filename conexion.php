<?php   
class connection{
    private $conn;

    public function __construct(){
        try {
            $this->conn = new mysqli("localhost", "root", "root", "moduloprueba");
        } catch (mysqli_sql_exception $e) {
            die('Connection Failed: '.$e->getMessage());
        }
    }
    public function get_connection(){
        
        return $this->conn;
    }
    
}

?>