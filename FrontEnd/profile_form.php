<?php
session_start();
//IF SESSIO WAS CREATE
if(empty($_SESSION['id']))
  header("location: ../index.php");

require "styles.php";

$curp = $_REQUEST['id'];

require "../BackEnd/conection.php";
$con = conecta();
#query for trastorns
$sql = "SELECT nombre FROM Trastorno WHERE nombre NOT IN (SELECT id_trastorno FROM Padecimiento where id_persona = '$curp') ORDER BY nombre";
$res = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SECOND PART</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script>
      function enviar(){
        var phyState = document.FORM1.phyState.value;
        var mindState = document.FORM1.mindState.value;

        if(phyState!='null' && mindState!='null'){
          document.FORM1.submit();
          return;
        }
        else{
          alert('Uncomplete form');
          return false;
        }
      }
      function add(curp, name, id){
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
              alert('ERROR: servidor conection');
            }
        });
      }
    </script>
  </head>
  <body>
  <center>
      <h2 style="margin-top:20px;"><span class="badge badge-secondary">State</span> Profile</h2>
      <div class="container mt-5">
        <form name="FORM1" action="../BackEnd/register_pp.php" method="post">

          <input type="hidden" name="curp" value="<?php echo $curp; ?>">

          <div class="form-group  col-md-3">
            <label for="phyState">Physical State</label>
            <select name="phyState" class="custom-select">
              <option value="null">select</option>
              <option value="Healthy">Healthy</option>
              <option value="Balanced">Balanced</option>
              <option value="Critical">Critical</option>
              <option value="Not Defined">Not Defined</option>
            </select>
          </div>

          <div class="form-group  col-md-3">
            <label for="mindState">Mental State</label>
            <select name="mindState" class="custom-select">
              <option value="null">select</option>
              <option value="Healthy">Healthy</option>
              <option value="Balanced">Balanced</option>
              <option value="Critical">Critical</option>
              <option value="Not Defined">Not Defined</option>
            </select>
          </div>

          <h4>Trastorns</h4>
          <div class="form.group col-md-6" style="height:340px;padding-bottom: 30px;overflow-y: scroll;">
            <table class="table table-sm" style="margin-top:5px;">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">Name</th>
                  <th scope="col"></th>
                </tr>
              </thead>
                <tbody>
                <?php
                $a = 0;
                  while($num = mysqli_fetch_assoc($res)){
                    $name = $num['nombre'];
                    echo "<tr id=$a>
                            <td>$name</td>
                            <td><button type=\"button\" class=\"btn btn-warning btn-sm\" onClick=\"add('$curp','$name',$a);\">Add</button></td>
                          </tr>";
                    $a+=1;
                  }
                ?>
              </tbody>
            </table>
          </div>

          <button type="button" class="btn btn-primary" onClick="enviar();" >Send</button>
        </form>
        <br><a href="home.php">Return</a>
      </div>

  </center>
  </body>
</html>
