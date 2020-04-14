<?php
session_start();
//IF SESSIO WAS CREATE
if(empty($_SESSION['id']))
  header("location: ../index.php");


$idu = $_GET['id'];

//CONECTION TO DATABASE
require "../BackEnd/conection.php";
require "styles.php";

$con = conecta();
$sql  = "SELECT * FROM Comunidad WHERE id_Comunidad = $idu";
$res = mysqli_query($con, $sql);
$num = mysqli_fetch_assoc($res);

$id = $num['id_Comunidad'];
$name = $num['nombre'];
$type = $num['tipo'];//donde, fila, columna
$ss = $num['sistema_social'];
$ci = $num['interes_comun'];
$obj = $num['objetivo'];
$par = $num['n_participantes'];

//segunda consulta para tabla de personas relacionadas
$sql = "SELECT Persona.curp,Persona.nombre,Persona.fecha_n FROM Persona,Com_Per WHERE Com_Per.id_comunidad = $id AND Persona.curp = Com_Per.id_persona ORDER BY Persona.nombre LIMIT 10";
$res = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $name; ?></title>
    <meta name"viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style media="screen">
      .leftBar{
        float: left;
        width: 7%;
        height: 100%;
      }
      .left_container{
        float: left;
        padding-top: 30px;
        width: 30%;
        height: 550px;
        background-color: white;
      }
      .rigth_container{
        float: left;
        padding-top: 30px;
        padding-left: 10px;
        padding-right: 10px;
        width: 55%;
        height: 550;
      }
    </style>
  </head>
  <body>
    <center>
    <div class="top"></div>
    <div width="100%" height="90px" style="padding-top:10px">
      <h1 class="display-4"><?php echo $name;?></h1>
    </div>
    <div class="leftBar"><h1></h1></div>
    <div class="left_container">
      <div class="col-sm">
        <h3><mark>Type</mark></h3>
        <h4><?php echo $type; ?></h4><br>
        <h3><mark>Social Sistem</mark></h3>
        <h4><?php echo $ss; ?></h4><br>
        <h3><mark>Common interes</mark></h3>
        <h4><?php echo $ci; ?></h4><br>
        <h3><mark>Objetive</mark></h3>
        <h4><?php echo $obj; ?></h4><br>
        <h3><mark>Participants</mark></h3>
        <h4><?php echo $par; ?></h4><br>
      </div>
    </div>
    <div class="rigth_container" >
      <a href="person_form.php?id=<?php echo $id;?>" class="btn btn-success btn-sm" role="button" aria-pressed="true">New Person</a>
      <a href="register_p.php?id=<?php echo $id;?>" class="btn btn-primary btn-sm" role="button" aria-pressed="true">Add Person</a>
      <table class="table table-sm" style="margin-top:5px;">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Birth</th>
            <th scope="col"></th>
          </tr>
        </thead>
          <tbody>
          <?php
            $i = 1;
            while($num = mysqli_fetch_assoc($res)){
              $curp = $num['curp'];
              $name = $num['nombre'];
              $date = $num['fecha_n'];
              echo "<tr>
                      <th scope=\"row\">$i</th>
                      <td>$name</td>
                      <td>$date</td>
                      <td><button type=\"button\" class=\"btn btn-warning btn-sm\" onClick=\"enviar('$curp');\">Edit</button></td>
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
