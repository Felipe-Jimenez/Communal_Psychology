<?php
require 'conection.php';
$con = conecta();

$idC = $_GET['id'];

//insertar en BD
$res = mysqli_query($con, $sql);

header("Location: ../FrontEnd/home.php");
?>
