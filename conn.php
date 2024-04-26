<?php
// $conn=mysqli_connect("localhost:4306","root","","db");
// if(isset($conn))
// {
//     echo "connected";
// }

class Database {
    private $servername = "localhost:4306";
    private $username = "root";
    private $password = "";
    private $database = "db";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: ");
        }
        else{
           // echo "connected successfully";
        }
    }
} 
$db = new Database();

?>
