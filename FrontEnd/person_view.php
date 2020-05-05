<?php
session_start();
//IF SESSIO WAS CREATE
if(empty($_SESSION['id']))
  header("location: ../index.php");

require "styles.php";
require "../BackEnd/conection.php";
$con = conecta();

$curp = $_REQUEST['id'];
$sql = "SELECT * FROM Persona,Perfil WHERE curp = '$curp' and id_persona = '$curp'";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);

$sexo = ($row['sexo'] == 'M')? "Male" : "Female";


$sql2 = "SELECT nombre FROM Trastorno WHERE nombre NOT IN (SELECT id_trastorno FROM Padecimiento where id_persona = '$curp') ORDER BY nombre";
$res2 = mysqli_query($con, $sql2);
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Person</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style media="screen">
      .title{
        float: left;
        height: 100px;
        width: 100%;
        padding-top: 30px;
        text-align: center;
      }
      .data{
        float: left;
        height: 550px;
        width: 30%;
        margin-left: 5%;
        padding-top: 10px;
        text-align: center;
        background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
      }
      .profile{
        float: left;
        height: 550px;
        width: 30%;
        padding-top: 10px;
        text-align: center;
        background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
      }
      .trastorns{
        float: left;
        height: 550px;
        width: 30%;
        padding-top: 10px;
        padding-left: 10px;
        padding-right: 10px;
        text-align: center;
        background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
      }
      .return{
        float: left;
        height: 10%;
        width: 100%;
        padding-top: 10px;
        text-align: center;
      }
    </style>
    <script>
      function show() {
        $('#mistake').html("Update :)");
        $('#mistake').css('visibility', 'visible');
        setTimeout("$('#mistake').css('visibility', 'hidden');",3000);
      }
      function updateProfile(){
        var curp = "<?php echo $curp; ?>";
        var phy = document.p_form.phyState.value;
        var mind = document.p_form.mindState.value;
        $.ajax({
          url: '../BackEnd/update_profile.php?curp='+curp+'&phy='+phy+'&mind='+mind,
          type: 'post',
          success: function(res){
            if(res == 0){
              alert('MISTAKE1: host not found');
            }else{
              show();
            }
          },error:function(){
              alert('MISTAKE: host not found');
            }
        });
      }
      function addTrastorn(curp, name, id){
        $.ajax({
          url: '../BackEnd/register_pad.php?curp='+curp+'&name='+name,
          type: 'post',
          success: function(res){
            if(res == 0){
              alert('MISTAKE: not insert user');
            }else{
              $('#'+id).hide();
            }
          },error:function(){
              alert('MISTAKE: host not found');
            }
        });
      }
    </script>
  </head>
  <body>

    <div class="title">
      <h1><?php echo $row['nombre']; ?></h1>
    </div>

    <div class="data">
      <h2><mark>Personal Data</mark></h2><br>
      <h4><mark>CURP</mark></h4><br>
      <h5><?php echo $row['curp']; ?></h5><br>
      <h4><mark>GENDER</mark></h4><br>
      <h5><?php echo $sexo; ?></h5><br>
      <h4><mark>BIRTH</mark></h4><br>
      <h5><?php echo $row['fecha_n']; ?></h5><br>
      <h4><mark>POSTAL CODE</mark></h4><br>
      <h5><?php echo $row['codigo_postal']; ?></h5><br>
    </div>

    <div class="profile">
      <h2><mark>Profile Data</mark></h2><br>
      <center>
      <form name="p_form">
        <div class="form-group  col-md-5">
          <label for="phyState">Physical State</label>
          <select name="phyState" id="phyState" class="custom-select">
            <option value="null">select</option>
            <option value="Healthy">Healthy</option>
            <option value="Balanced">Balanced</option>
            <option value="Critical">Critical</option>
            <option value="Not Defined">Not Defined</option>
          </select>
        </div>

        <div class="form-group  col-md-5">
          <label for="mindState">Mental State</label>
          <select name="mindState" id="mindState" class="custom-select">
            <option value="null">select</option>
            <option value="Healthy">Healthy</option>
            <option value="Balanced">Balanced</option>
            <option value="Critical">Critical</option>
            <option value="Not Defined">Not Defined</option>
          </select>
        </div>

        <button type="button" class="btn btn-info btn-sm" onClick="updateProfile();">Update</button>
      </form>
      </center>

      <br><div class="alert alert-info" role="alert" id="mistake" style="visibility:hidden;"></div>
    </div>

    <div class="trastorns">
      <h2><mark>Add Traston</mark></h2>
      <table class="table table-striped table-sm" style="margin-top:30px;">
        <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col"></th>
        </tr>
        </thead>
          <tbody>
            <?php
              $a = 0;
              while($num = mysqli_fetch_assoc($res2)){
                $name = $num['nombre'];
                echo "<tr id=$a>
                      <td>$name</td>
                      <td><button type=\"button\" class=\"btn btn-warning btn-sm\" onClick=\"addTrastorn('$curp','$name',$a);\">Add</button></td>
                      </tr>";
                $a+=1;
              }
            ?>
          </tbody>
        </table>
    </div>

    <div class="return">
      <a href="home.php">Return</a>
    </div>

    <script>
      document.ready = document.getElementById("phyState").value = "<?php echo $row['salud_fisica'];?>";
      document.ready = document.getElementById("mindState").value = "<?php echo $row['salud_mental'];?>";
    </script>
  </body>
</html>
