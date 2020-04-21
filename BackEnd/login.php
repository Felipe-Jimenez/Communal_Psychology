<?php
session_start();

require "conection.php";
$con = conecta();

$email = $_REQUEST['email'];
$pasw = $_REQUEST['pasw'];
$pas_md5 = md5($pasw);

$sql = "SELECT * FROM Administrador WHERE email='$email' AND pasw='$pas_md5' AND estatus=1 AND eliminado=0";
$res = mysqli_query($con, $sql);
$query = mysqli_fetch_assoc($res);
$num = mysqli_num_rows($res);

if($num){
  $_SESSION['id'] = $query['id'];
  $_SESSION['name'] = $query['nombre'];
}

echo $num;
?>
