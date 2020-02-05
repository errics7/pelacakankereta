<?php

class Rfid{
    private $mysqli;

    function __construct($conn){
            $this->mysqli = $conn;
    }

    public function uptd($UID, $Dest, $Prev, $Cur, $Next){
        $db = $this->mysqli->conn;
        $sql = "INSERT INTO `pemantauan_kereta`(`UID`, `destination`, `prev_station`, `current_station`, `waktu_tiba_curr`, `next_station`) 
                VALUES ('$UID','$Dest','$Prev','$Cur',now()+ INTERVAL 1 HOUR,'$Next')";
        $query = $db->query($sql) or die ($db->error);
    }
}

?>