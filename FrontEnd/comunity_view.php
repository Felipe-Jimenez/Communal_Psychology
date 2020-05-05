<?php
session_start();
//IF SESSIO WAS CREATE
if(empty($_SESSION['id']))
  header("location: ../index.php");

$idc = $_GET['id'];

//CONECTION TO DATABASE
require "../BackEnd/conection.php";
require "styles.php";

$con = conecta();
$sql  = "SELECT * FROM Comunidad WHERE id_Comunidad = $idc";
$res = mysqli_query($con, $sql);
$num = mysqli_fetch_assoc($res);

$id = $num['id_Comunidad'];
$name = $num['nombre'];
$type = $num['tipo'];//donde, fila, columna
$ss = $num['sistema_social'];
$ci = $num['interes_comun'];
$obj = $num['objetivo'];
$par = $num['n_participantes'];

//PERSONA REALTIONED WITH THE COMUNITY
$sql = "SELECT curp,nombre,rol FROM Persona join Rol on id_comunidad=$id and curp=id_persona ORDER BY nombre";
$res = mysqli_query($con, $sql);

$divClear = "clearDiv(".$id.");";

//STADISTICS GENDER
$sql2 = "SELECT sexo, count(*) as n FROM Persona join Rol on id_comunidad = $id and id_persona = curp GROUP BY sexo ORDER BY sexo";
$res2 = mysqli_query($con, $sql2);
$data = array();

//STADISTICS TRASTORNS
$sql3 = "SELECT id_trastorno, count(*) as n FROM Padecimiento where id_persona in (SELECT id_persona from Rol where id_comunidad = $id) group by id_trastorno";
$res3 = mysqli_query($con, $sql3);
$data2 = array();

//STADISTICS MENTAL STATE
$sql4 = "SELECT salud_mental, count(*) as n FROM Perfil where id_persona in (select id_persona from Rol where id_comunidad = $id) group by salud_mental";
$res4 = mysqli_query($con, $sql4);
$data3 = array();

//STADISTICS PHYSICAL STATE
$sql5 = "SELECT salud_fisica, count(*) as n FROM Perfil where id_persona in (select id_persona from Rol where id_comunidad = $id) group by salud_fisica";
$res5 = mysqli_query($con, $sql5);
$data4 = array();

//donut GENDER
while($row = mysqli_fetch_assoc($res2)){
  if($row['sexo'] == 'F')
    $sex = "Famale";
  else
    $sex = "Male";

  $data[] = array(
    'label' => $sex,
    'value' => $row['n']
  );
}
$data = json_encode($data);

//donut TRASTORNS
while($row2 = mysqli_fetch_assoc($res3)){
  $data2[] = array(
    'label' => $row2['id_trastorno'],
    'value' => $row2['n']
  );
}
$data2 = json_encode($data2);

//donut MENTAL STATE
while($row3 = mysqli_fetch_assoc($res4)){
  $data3[] = array(
    'label' => $row3['salud_mental'],
    'value' => $row3['n']
  );
}
$data3 = json_encode($data3);

//donut PHYSICAL STATE
while($row4 = mysqli_fetch_assoc($res5)){
  $data4[] = array(
    'label' => $row4['salud_fisica'],
    'value' => $row4['n']
  );
}
$data4 = json_encode($data4);

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
        height: 1000px;
      }
      .left_container{
        float: left;
        margin-top: 50px;
        padding-top: 35px;
        width: 30%;
        height: 550px;
        background-color: white;
      }
      .rigth_container{
        float: left;
        width: 55%;
        height: 550px;
        margin-top: 50px;
        padding-left: 10px;
        padding-right: 10px;
        overflow-y: scroll;
      }
      .top{
        float: left;
        width: 100%;
        height: 90px;
        padding-top: 10px;
      }
      .donut{
        float: left;
        width: 21.5%;
        height: 400px;
        margin-top: 100px;
        padding-left: 10px;
        padding-right: 10px;
      }
    </style>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
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
    <div class="top">
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
    <div id="donut" class="donut"><h3><mark>Genders</mark></h3></div>
    <div id="donut2" class="donut"><h3><mark>Common Disorders</mark></h3></div>
    <div id="donut3" class="donut"><h3><mark>Mental State</mark></h3></div>
    <div id="donut4" class="donut"><h3><mark>Physical State</mark></h3></div>
    <div class="top"></div>

  </center>

  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  </body>
</html>

<script type="text/javascript">

$(document).ready(function(){
  var donut_chart = Morris.Donut({
    element : 'donut',
    data: <?php echo $data; ?>,
    colors:['#ffe6e6','#b3cce6'],
    rezise: true
  });
});

$(document).ready(function(){
  var donut_chart = Morris.Donut({
    element : 'donut2',
    data: <?php echo $data2; ?>,
    colors:['#c2c2d6','#ff6666','#ffe6e6','#adebeb','#b3cce6','#d98c8c','#ff8c66','#ffd966','#c2c2a3','#8cd9b3'],
    rezise: true
  });
});

$(document).ready(function(){
  var donut_chart = Morris.Donut({
    element : 'donut3',
    data: <?php echo $data3; ?>,
    colors:['#c2c2d6','#ffd966','#c2c2a3','#8cd9b3','#ff6666','#ffe6e6','#adebeb','#b3cce6','#d98c8c','#ff8c66'],
    rezise: true
  });
});

$(document).ready(function(){
  var donut_chart = Morris.Donut({
    element : 'donut4',
    data: <?php echo $data4; ?>,
    colors:['#c2c2d6','#ffd966','#c2c2a3','#8cd9b3','#ff6666','#ffe6e6','#adebeb','#b3cce6','#d98c8c','#ff8c66'],
    rezise: true
  });
});
</script>
