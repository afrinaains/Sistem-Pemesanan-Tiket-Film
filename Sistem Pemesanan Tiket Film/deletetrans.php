<?php
$idpenjual = $_GET['idpenjual'];
$idtrans = $_GET['idtrans'];
include 'config.php';

$result = mysqli_query($connect, "DELETE FROM tiket WHERE id_tiket=$idtrans");

if($result){
header("Location: adminpage.php?id=$idpenjual");
}
?>