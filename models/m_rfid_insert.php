<?php

class Rfid{
    private $mysqli;

    function __construct($conn){
            $this->mysqli = $conn;
    }

    public function uptd($UID, $Dest, $Prev, $Cur, $Next){
        $db = $this->mysqli->conn;
        $sql = "INSERT INTO `pemantauan_kereta`( `histori`, `UID`, `destination`, `prev_station`, `current_station`, `next_station`) 
                VALUES ((NOW() + INTERVAL 7 HOUR),'$UID','$Dest','$Prev','$Cur','$Next')";
        $query = $db->query($sql) or die ($db->error);
    }
}

?>