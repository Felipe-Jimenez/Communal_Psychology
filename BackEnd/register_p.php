<?php
require 'conection.php';
$con = conecta();

//struct data
$idC = $_POST['idC'];
$curp = $_POST['curp'];
$name = $_POST['name'];
$gender = $_POST['gender'];
$rol = $_POST['rol'];
$birth = $_POST['birth'];
$pc = $_POST['pc'];

//insertar en BD
$sql = "INSERT INTO Persona values ('$curp','$name','$gender','$birth',$pc)";
$res = mysqli_query($con, $sql);

if($res){
  $sql = "INSERT INTO Rol values ('$rol','$curp',$idC,1)";
  mysqli_query($con, $sql);
  $sql = "UPDATE Comunidad set n_participantes = n_participantes+1 where id_Comunidad = $idC";
  mysqli_query($con, $sql);
}

header("Location: ../FrontEnd/profile_form.php?id=$curp");
?>
