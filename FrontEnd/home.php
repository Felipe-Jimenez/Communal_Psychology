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
    <title id="t">Community psychology</title>
    <meta name"viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <style media="screen">
      html{
        scroll-behavior: smooth;
      }
      .r1{
        margin-top: 30px;
        margin-bottom: 50px;
      }
      #a{
        padding-top: 30px;
        height: 600px;
      }
      .about{
        width: 80%;
        height: 650px;
        margin-top: 50px;
        margin-bottom: 50px;
        padding-top: 30px;
        background-image: linear-gradient(to top, #fff7e6 0%, #f2f2f2 100%);
      }
      p{
        font-size: 22px;
        margin-top: 20px;
      }
      span{
        font-weight: bolder;
      }
      .bot{
        background-color: #2E3436;
        width: 100%;
        height: 70px;
        margin-top: 20px;
      }
    </style>
  </head>
  <body>
    <center>
    <div width="100%" height="90px" style="padding-top:10px">
      <h1 class="display-3">Community Psychology</h1>
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
    <a href="#ancla">About this</a>
    <div class="about" id="ancla">
      <h1>A little bite <span>about</span> this project</h1>
      <div class="row">
        <div class="col-sm-6">
          <h2>Objetive</h2>
          <p>This page was created with the aim of statistically informing the development of psychological and psychopathological problems of the communities in their development area, as well as the mental and physical development of those people belonging to communities with concurrent tendencies or in complex analysis of a specific person</p>
        </div>
      </div>
    </div>
      <a href="#anclArriba">Go Up</a>
    <div class="bot">
      <a href="https://github.com/Felipe-Jimenez/Communal_Psychology.git" target="_blank">
        <img src="../imgs/github.png" height="50px" width="50px" style="margin-top:10px">
      </a>
    </div>
  </center>

  </body>
</html>
