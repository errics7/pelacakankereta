<?php
class Kereta{
    private $mysqli;

    function __construct($conn){
            $this->mysqli = $conn;
    }

    public function tampil_kereta(){
        $db = $this->mysqli->conn;
        $sql = "CALL `tampil_kereta`;";
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }

    public function tambah($UID_kereta, $nama_kereta){
        $db = $this->mysqli->conn;
        $sql = "select * from idkereta where ID='$UID_kereta'";
        $query = $db->query($sql) or die ($db->error);
        $num = mysqli_num_rows($query);
        if ($num>0){
            return 0;
        } else {
            $sql = "CALL `tmbah_kereta` ('$UID_kereta','$nama_kereta');";
            $query = $db->query($sql) or die ($db->error);
            return 1;
        }
    }

    public function edit($ID_old, $ID_new, $nama_kereta){
        $db = $this->mysqli->conn;
        $sql = "select * from idkereta where ID='$ID_old'";
        $query = $db->query($sql) or die ($db->error);
        $num = mysqli_num_rows($query);
        if ($num>0){
            $sql = "UPDATE `idkereta` SET `ID`='$ID_new',`nama_kereta`='$nama_kereta' WHERE `ID`='$ID_old'";
            $query = $db->query($sql) or die ($db->error);
            return 1;
        } else {
            return 0;
        }
    }

    public function hapus($ID){
        $db = $this->mysqli->conn;
        $sql = "select * from idkereta where ID='$ID'";
        $query = $db->query($sql) or die ($db->error);
        $num = mysqli_num_rows($query);
        if ($num>0){
            $sql = "DELETE FROM `idkereta` WHERE `ID`='$ID'";
            $query = $db->query($sql) or die ($db->error);
            return 1;
        } else {
            return 0;
        }
    }
}
?>