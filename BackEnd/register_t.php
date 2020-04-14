<?php
require 'conection.php';
$con = conecta();

//recibe variables
$nombre = $_POST['name'];
$type = $_POST['type'];
$des = $_POST['des'];

//insertar en BD
$sql = "INSERT INTO Trastorno VALUES(NULL, '$nombre', '$type', '$des')";
$res = mysqli_query($con, $sql);

header("Location: ../FrontEnd/home.php");
?>
