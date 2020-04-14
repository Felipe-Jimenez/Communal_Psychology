<?php
session_start();
//IF SESSIO WAS CREATE
if(empty($_SESSION['id']))
  header("location: ../index.php");

require "styles.php";
?>

<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>REGISTER</title>
    <meta name"viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script>
      function enviar(){//funcion que valida campos vacios
        var name = document.FORM1.name.value;
        var type = document.FORM1.type.value;
        var ss = document.FORM1.ss.value;
        var ci = document.FORM1.ci.value;
        var obj = document.FORM1.obj.value;
        if(name!='' && type !=0 && ss !=0 && ci!='' && obj!=''){
          document.FORM1.submit();
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
    <div style="margin-top:20px;">
      <h2><span class="badge badge-secondary">Comunity</span> registration</h2>
      <div>
        <form name="FORM1" action="../BackEnd/register_c.php" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <div class="col">
            <input  name="name" type="text" class="form-group mx-sm-3 mb-2" placeholder="Example">
          </div>
        </div>
        <div class="form-group col-md-2">
          <label for="type">Type</label>
          <select name="type"  class="custom-select">
            <option value=0>select</option>
            <option value="Digital">Digital</option>
            <option value="Social">Social</option>
            <option value="Academic">Academic</option>
            <option value="Scientific">Scientific</option>
            <option value="Union">Union</option>
            <option value="Community">Community</option>
            <option value="Ethnic">Ethnic</option>
            <option value="Politic">Politic</option>
          </select>
        </div>
        <div class="form-group  col-md-2">
          <label for="ss">Social sistem</label>
          <select name="ss" class="custom-select">
            <option value=0>select</option>
            <option value="Capitalist">Capitalist</option>
            <option value="Socialist">Socialist</option>
            <option value="Comunist">Comunist</option>
            <option value="Monarchy">Monarchy</option>
            <option value="Anarchy">Anarchy</option>
            <option value="Utopic">Utopic</option>
          </select>
        </div>
        <div class="form-group">
          <div class="col col-md-3">
            <label for="ci">Common interes</label><br>
            <textarea name="ci" class="form-control" rows="2"></textarea>
          </div>
        </div>
        <div class="form-group">
          <div class="col col-md-3">
            <label for="obj">Objetive</label><br>
            <textarea name="obj" class="form-control" rows="2" placeholder="What is your dream?"></textarea>
          </div>
        </div>
          <button type="button" class="btn btn-primary" onClick="enviar();" >Send</button>
        </form>
        <br><a href="home.php">Return</a><br><br>
      </div>
    </div>
  </center>

  </body>
</html>
