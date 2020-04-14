<?php
require 'conection.php';
$con = conecta();

//recibe variables
$nombre = $_POST['name'];
$type = $_POST['type'];
$des = $_POST['des'];

//Ejecuta query
$sql = "INSERT INTO Trastorno VALUES('$nombre', '$type', '$des')";
$res = mysqli_query($con, $sql);

header("Location: ../FrontEnd/home.php");
?>
