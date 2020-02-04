<?php
include "models/m_rfid_insert.php";
$update = new Rfid($connection);

$UID = @$_GET['UID'];
$Dest = @$_GET['Dest'];
$Prev = @$_GET['Prev'];
$Cur = @$_GET['Cur'];
$Next = @$_GET['Next'];

$update->uptd($UID, $Dest, $Prev, $Cur, $Next);
?>