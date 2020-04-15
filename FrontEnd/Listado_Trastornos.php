<?php
session_start();
//IF SESSIO WAS CREATE
if(empty($_SESSION['id']))
  header("location: ../index.php");

//CONECTION TO DATABASE
require "../BackEnd/conection.php";
require "styles.php";
$con = conecta();
$sql  = "SELECT * FROM Trastorno ORDER BY nombre";
$res = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registeres Comunities</title>
    <meta name"viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style media="screen">
      .middle{
        margin-top: 10px;
        padding-top: 10px;
        width: 80%;
        height: 100%;
      }
    </style>
  </head>
  <body>
    <center>
    <div class="middle">
      <h3>Registered <mark>Disorders</mark></h3>
      <table class="table table-md table-striped mt-4">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Description</th>
          </tr>
        </thead>
          <tbody>
          <?php
            $i = 0;
            while($num = mysqli_fetch_assoc($res)){
              $name = $num['nombre'];
              $type = $num['tipo'];//donde, fila, columna
              $des = $num['descripcion'];
              echo "<tr>
                      <th scope=\"row\">$name</th>
                      <td>$type</td>
                      <td>$des</td>
                    </tr>";
              $i += 1;
            }
          ?>
        </tbody>
      </table>
    </div>

  </center>
  </body>
</html>
