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
  $sql = "SELECT * FROM Comunidad WHERE nombre LIKE '%$name%'";
}
else
  $sql  = "SELECT * FROM Comunidad ORDER BY nombre";


$res = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registeres Comunities</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style media="screen">
      .middle{
        margin-top: 10px;
        width: 80%;
        height: 600px;
        overflow-y: scroll;
      }
    </style>
    <script>
        function enviar(n){
          window.location = "comunity_view.php?id="+n;
        }
    </script>
  </head>
  <body>
    <center>
    <h3 style="margin-top:15px;">Registered <mark>Comunities</mark></h3>
    <form class="form-inline" action="Listado_comunidades.php" method="post" style="margin-left:70%;margin-top:10px;">
      <input type="text" name="name" value="" placeholder="Name">
      <button type="submit" name="btnSearch" class="btn btn-warning btn-sm" style="margin-left:10px;">Search</button>
    </form>
    <div class="middle">
      <table class="table table-md table-striped mt-4">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Social System</th>
            <th scope="col">Common Interest</th>
            <th scope="col">Participants</th>
            <th scope="col"></th>
          </tr>
        </thead>
          <tbody>
          <?php
            $i = 0;
            while($num = mysqli_fetch_assoc($res)){
              $id = $num['id_Comunidad'];
              $name = $num['nombre'];
              $type = $num['tipo'];//donde, fila, columna
              $ss = $num['sistema_social'];
              $ci = $num['interes_comun'];
              $par = $num['n_participantes'];
              echo "<tr>
                      <th scope=\"row\">$name</th>
                      <td>$type</td>
                      <td>$ss</td>
                      <td>$ci</td>
                      <td>$par</td>
                      <td><button type=\"button\" class=\"btn btn-info btn-sm\" onClick=\"enviar($id);\">View</button></td>
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
