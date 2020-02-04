<?php
class Riwayat{
    private $mysqli;

    function __construct($conn){
            $this->mysqli = $conn;
    }

    public function tampil_riwayat(){
        $db = $this->mysqli->conn;
        $sql = "CALL `tampil_riwayat`;";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
}
?>