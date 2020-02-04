<?php
session_start();

class Login{
    private $mysqli;

    function __construct($conn){
            $this->mysqli = $conn;
    }

    public function login($user, $pass){
        $db = $this->mysqli->conn;
        $sql = "select * from admin where username='$user' and password='$pass'";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
}
?>