<?php
require "conection.php";
$con = conecta();

$curp = $_REQUEST['curp'];
$name = $_REQUEST['name'];

//insertar en BD
$sql = "INSERT INTO Padecimiento values ('$curp','$name','Balanced')";
mysqli_query($con, $sql);

echo $res;
?>
