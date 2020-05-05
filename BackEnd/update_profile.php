<?php
session_start();

require "conection.php";
$con = conecta();

$curp = $_REQUEST['curp'];
$phy = $_REQUEST['phy'];
$mind = $_REQUEST['mind'];

$sql = "UPDATE Perfil SET salud_fisica='$phy', salud_mental='$mind' WHERE id_persona='$curp'";
$res = mysqli_query($con, $sql);

echo $res;
?>
