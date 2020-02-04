<?php
class Stasiun{
    private $mysqli;

    function __construct($conn){
            $this->mysqli = $conn;
    }

    public function tampil_stasiun(){
        $db = $this->mysqli->conn;
        $sql = "CALL `tampil_stasiun`;";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function tambah($ID_stasiun, $nama){
        $db = $this->mysqli->conn;
        $sql = "select * from idstasiun where ID='$ID_stasiun'";
        $query = $db->query($sql) or die ($db->error);
        $num = mysqli_num_rows($query);
        if ($num>0){
            return 0;
        } else {
            $sql = "CALL `tmbah_stasiun` ('$ID_stasiun','$nama');";
            $query = $db->query($sql) or die ($db->error);
            return 1;
        }
    }

    public function edit($ID_old, $ID_new, $nama){
        $db = $this->mysqli->conn;
        $sql = "select * from idstasiun where ID='$ID_old'";
        $query = $db->query($sql) or die ($db->error);
        $num = mysqli_num_rows($query);
        if ($num>0){
            $sql = "UPDATE `idstasiun` SET `ID`='$ID_new',`nama_station`='$nama' WHERE `ID`='$ID_old'";
            $query = $db->query($sql) or die ($db->error);
            return 1;
        } else {
            return 0;
        }
    }

    public function hapus($ID){
        $db = $this->mysqli->conn;
        $sql = "select * from idstasiun where ID='$ID'";
        $query = $db->query($sql) or die ($db->error);
        $num = mysqli_num_rows($query);
        if ($num>0){
            $sql = "DELETE FROM `idstasiun` WHERE `ID`='$ID'";
            $query = $db->query($sql) or die ($db->error);
            return 1;
        } else {
            return 0;
        }
    }
}
?>