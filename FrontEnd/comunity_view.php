<?php
session_start();
//IF SESSIO WAS CREATE
if(empty($_SESSION['id']))
  header("location: ../index.php");

$idC = $_GET['id'];

//CONECTION TO DATABASE
require "../BackEnd/conection.php";
require "styles.php";

$con = conecta();
$sql  = "SELECT * FROM Comunidad WHERE id_Comunidad = $idC";
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
$sql = "SELECT curp,nombre,rol FROM Persona join Rol on id_comunidad=$id and curp=id_persona ORDER BY nombre";
$res = mysqli_query($con, $sql);

$divClear = "clearDiv(".$idC.");";
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
        margin-top: 65px;
        padding-top: 35px;
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
        overflow-y: scroll;
      }
    </style>
    <script>
      function enviar(n){
        window.location = "person_view.php?id="+n;
      }
      function clearDiv(id){
          document.getElementById("d1").innerHTML = "";
          $('#d1').load('../BackEnd/notIn.php?idC='+id);
      }
      function reload(){
        location.reload();
      }
      function agregar(curp, idC){
        $.ajax({
          url: '../BackEnd/add.php?curp='+curp+'&idC='+idC,
          type: 'post',
          success: function(res){
            if(res == 0){
              alert('MISTAKE: not insert user');
            }else{
              $('#'+curp).hide();
            }
          },error:function(){
              alert('ERROR: servidor conection');
            }
        });
      }
    </script>
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
    <div class="rigth_container" id="d1">
      <a href="person_form.php?idC=<?php echo $id;?>" class="btn btn-success btn-sm" role="button" aria-pressed="true">New Person</a>
      <button class="btn btn-primary btn-sm" onClick=<?php echo $divClear;?>>Add Person</button>
      <table class="table table-sm" style="margin-top:5px;">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Rol</th>
            <th scope="col"></th>
          </tr>
        </thead>
          <tbody>
          <?php
            $i = 1;
            while($num = mysqli_fetch_assoc($res)){
              $curp = $num['curp'];
              $name = $num['nombre'];
              $rol = $num['rol'];
              echo "<tr>
                      <th scope=\"row\">$i</th>
                      <td>$name</td>
                      <td>$rol</td>
                      <td><button type=\"button\" class=\"btn btn-warning btn-sm\" onClick=\"enviar('$curp');\">View</button></td>
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
