<?php
session_start();
//IF SESSIO WAS CREATE
//if(empty($_SESSION['id']))
  //header("location: ../index.php");

require "styles.php";
 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>REGISTER</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script>
      function enviar(){
        var curp = document.FORM1.curp.value;
        var name = document.FORM1.name.value;
        var gender = document.FORM1.gender.value;
        var birth = document.FORM1.birth.value;

        if(curp!='' && name!='' && gender!='null' && birth!=''){
          //document.FORM1.submit();
          alert("do it!");
          return;
        }
        else{
          alert('Uncomplete form');
          return false;
        }
      }
    </script>
  </head>
  <body>
  <center>
      <h2 style="margin-top:20px;"><span class="badge badge-secondary">Person</span> registration</h2>
      <div class="container mt-5">
        <form name="FORM1" action="../BackEnd/register_c.php" method="post">

          <div class="form-group">
            <label for="curp">CURP</label>
            <div class="col">
              <input  name="curp" type="text" class="form-group mx-sm-3 mb-2">
            </div>
          </div>

          <div class="form-group">
            <label for="name">Name</label>
            <div class="col">
              <input  name="name" type="text" class="form-group mx-sm-3 mb-2" placeholder="Example">
            </div>
          </div>

          <div class="form-group  col-md-2">
            <label for="gender">Gender</label>
            <select name="gender" class="custom-select">
              <option value="null">select</option>
              <option value="F">Female</option>
              <option value="M">Male</option>
            </select>
          </div>

          <div class="form-group">
            <label for="birth">Birth day</label><br>
            <div class="col">
              <input type="date" name="birth">
            </div>
          </div>

            <button type="button" class="btn btn-primary" onClick="enviar();" >Send</button>
        </form>
        <br><a href="home.php">Return</a>
      </div>
  
  </center>
  </body>
</html>