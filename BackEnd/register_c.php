<?php
require 'conection.php';
$con = conecta();

//recibe variables
$nombre = $_POST['name'];
$type = $_POST['type'];
$ss = $_POST['ss'];
$ci = $_POST['ci'];
$obj = $_POST['obj'];

//insertar en BD
$sql = "INSERT INTO Comunidad VALUES(NULL, '$nombre', '$type', '$ss', '$ci', '$obj',0)";
$res = mysqli_query($con, $sql);

header("Location: ../FrontEnd/home.php");
?>
