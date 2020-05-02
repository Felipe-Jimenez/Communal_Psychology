<?php
require 'conection.php';
$con = conecta();

//struct data
$curp = $_POST['curp'];
$phyState = $_POST['phyState'];
$mindState = $_POST['mindState'];
//insertar en BD
$sql = "INSERT INTO Perfil values ('$curp','$phyState','$mindState')";
$res = mysqli_query($con, $sql);

header("Location: ../FrontEnd/home.php");
?>
