<?php
session_start();
//IF SESSIO WAS CREATE
if(empty($_SESSION['id']))
  header("location: ../index.php");

$id = $_SESSION['id'];

//CONECTION TO DATABASE
require "../BackEnd/conection.php";
require "styles.php";

$con = conecta();

//QUERY
$sql  = "SELECT * FROM Administrador WHERE id=$id AND estatus=1 AND eliminado=0";
$res = mysqli_query($con, $sql);
$num = mysqli_fetch_assoc($res);

//USER DATA
$name = $num['nombre'];
$email = $num['email'];
$status = 'Active';

?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <center>
    <div class="">
      <h4 style="font-size: 34px;"><mark><?php echo $name;?></mark></h4>
    </div>
    <div class="list">
      <ul class="list-group">
        <li class="list-group-item"><?php echo $email;?></li>
        <li class="list-group-item"><?php echo $status;?></li>
      </ul>
    </div>
  </center>
</body>

</html>
