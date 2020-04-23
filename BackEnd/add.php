<?php
require "conection.php";
$con = conecta();

$idC = $_REQUEST['idC'];
$curp = $_REQUEST['curp'];

//insertar en BD
$sql = "INSERT INTO Rol values ('Member','$curp',$idC,1)";
mysqli_query($con, $sql);
$sql = "UPDATE Comunidad set n_participantes = n_participantes+1 where id_Comunidad = $idC";
$res = mysqli_query($con, $sql);

echo $res;
?>
