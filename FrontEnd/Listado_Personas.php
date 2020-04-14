<?php
session_start();
//IF SESSIO WAS CREATE
if(empty($_SESSION['id']))
  header("location: ../index.php");

//CONECTION TO DATABASE
require "../BackEnd/conection.php";
require "styles.php";
$con = conecta();
$sql  = "SELECT * FROM Persona ORDER BY curp";
$res = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name"viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style media="screen">
      .middle{
        float: left;
        padding-top: 10px;
        width: 80%;
        height: 100%;
      }
    </style>
  </head>
  <body>
    <div class="leftBar">
      <h2></h2>
    </div>
    <div class="middle">
      <center>
      <h3>Registered <mark>Persons</mark></h3>
      <table class="table table-sm table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">CURP</th>
            <th scope="col">Name</th>
            <th scope="col">Gender</th>
            <th scope="col">Birth</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $i = 0;
          while($num = mysqli_fetch_assoc($res)){
            $curp = $num['curp'];
            $name = $num['nombre'];//donde, fila, columna
            $gender = $num['sexo'];
            $date = $num['fecha_n'];

            echo "<tr>
                    <th scope=\"row\">$curp</th>
                    <td>$name</td>
                    <td>$gender</td>
                    <td>$date</td>
                  </tr>";

            $i += 1;
          }
        ?>
      </tbody>
      </table>
    </center>
    </div>

  </body>
</html>
