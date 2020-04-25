<?php
session_start();
//IF SESSIO WAS CREATE
if(empty($_SESSION['id']))
  header("location: ../index.php");

//CONECTION TO DATABASE
require "../BackEnd/conection.php";
require "styles.php";
$con = conecta();

if(!empty($_POST['name'])){
  $name = $_POST['name'];
  $sql = "SELECT * FROM Persona WHERE nombre LIKE '%$name%'";
}
else{
  $sql  = "SELECT * FROM Persona ORDER BY curp";
}

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
        margin-top: 15px;
        width: 80%;
        height: 600px;
        overflow-y: scroll;
      }
    </style>
  </head>
  <body>
    <center>

    <h3 style="margin-top:15px;">Registered <mark>Persons</mark></h3>
    <form class="form-inline" action="Listado_Personas.php" method="post" style="margin-left:70%;margin-top:10px;">
      <input type="text" name="name" value="" placeholder="Name">
      <button type="submit" name="btnSearch" class="btn btn-warning btn-sm" style="margin-left:10px;">Search</button>
    </form>
    <div class="middle">
      <table class="table table-md table-striped mt-4">
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
    </div>

  </center>
  </body>
</html>
