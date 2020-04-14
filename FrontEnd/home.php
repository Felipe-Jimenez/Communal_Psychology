<?php
session_start();

if(empty($_SESSION['id']))
  header("location: ../index.php");

require "styles.php";
 ?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Community psychology</title>
    <meta name"viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style media="screen">
      .r1{
        padding-bottom: 30px;
      }
      #a{
        padding-top: 30px;
      }
    </style>
  </head>
  <body>
    <center>
    <div width="100%" height="90px" style="padding-top:10px">
      <h1 class="display-4">Community Psychology</h1>
    </div>
    <div class="container" id="a">
      <div class="row r1">
        <div class="col-sm">
          <a href="Listado_comunidades.php">
            <img src="../imgs/list_comuniti.png" height="130px" width="130px">
          </a>
          <h5><mark>Registered Comunities</mark></h5>
        </div>
        <div class="col-sm">
          <a href="Listado_Trastornos.php">
            <img src="../imgs/list_transtorns.png" height="140px" width="140px">
          </a>
          <h5><mark>Registered Disorders</mark></h5>
        </div>
        <div class="col-sm">
          <a href="Listado_Personas.php">
            <img src="../imgs/list_persons.png" height="130px" width="165px">
          </a><br>
          <h5><mark>Registered Persons</mark></h5>
        </div>
      </div>
      <div class="row">
        <div class="col-sm">
          <a href="comunity_form.php">
            <img src="../imgs/register_comuniti.png" height="140px" width="140px">
          </a>
          <h5><mark>New Comunity</mark></h5>
        </div>
        <div class="col-sm">
          <a href="transtorn_form.php">
            <img src="../imgs/register_transtorn.png" height="145px" width="145px">
          </a>
          <h5><mark>New Disorder</mark></h5>
        </div>
        <div class="col-sm">
          <a href="search_person.php">
            <img src="../imgs/person_search.png" height="130px" width="130px">
          </a>
          <h5><mark>Search by Name</mark></h5>
        </div>
      </div>
    </div>
  </center>

  </body>
</html>
