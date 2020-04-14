<?php
session_start();
//IF SESSIO WAS CREATE
if(empty($_SESSION['id']))
  header("location: ../index.php");

require "styles.php" ?>

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
        var des = document.FORM1.des.value;
        if(name!='' && type !=0 && des !=''){
          document.FORM1.submit();
          return;
        }
        else{
          alert('Uncomplete form');
          return false;
        }
      }
    </script>
    <style media="screen">
      .middle{
        float: left;
        padding-top: 10px;
        width: 80%;
        height: 70%;
      }
    </style>
  </head>
  <body>
  <center>
    <div class="top"></div>
    <div class="leftBar"><h1></h1></div>
    <div class="middle">
      <h2><span class="badge badge-secondary">Disorder</span> registration</h2>
      <div id="father">
        <form name="FORM1" action="../Backend/register_t.php" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <div class="col">
            <input  name="name" type="text" class="form-group mx-sm-3 mb-2" placeholder="Example">
          </div>
        </div>
        <div class="form-group col-md-3">
          <label for="type">Type</label>
          <select name="type"  class="custom-select">
            <option value=0>select</option>
            <option value="Mental">Mental</option>
            <option value="Physical">Physical</option>
            <option value="Physical">Sexual</option>
          </select>
        </div>
        <div class="form-group">
          <div class="col col-md-4">
            <label for="des">Diagnostic criteria</label><br>
            <textarea name="des" class="form-control" rows="2"></textarea>
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
