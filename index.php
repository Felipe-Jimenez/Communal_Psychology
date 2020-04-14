<?php
session_start();

if(isset($_SESSION['id']))
  header("location: FrontEnd/home.php");
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name"viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style media="screen">
      *{
        margin: 0;
      }
      body{
        background-color: #f2f2f2;
      }
      .top{
        float: left;
        width: 100%;
        height: 70px;
        background-color: black;
      }
      .middle{
        float: left;
        width: 40%;
        height: 500px;
        padding-top: 30px;
      }
      .bar{
        float: left;
        width: 30%;
        height: 500px;
        padding-top: 50px;
      }
    </style>
    <script>
      function enviar(){
        var email = document.FORMA1.email.value;
        var pasw = document.FORMA1.pasw.value;
        if(email != "" && pasw != ""){
          $.ajax({
            url: 'BackEnd/login.php?email='+email+'&pasw='+pasw,
            type: 'post',
            success: function(res){
              if(res == 0){
                alert('User not found');
              }else{
                window.location.href = 'FrontEnd/home.php';
              }
            },error:function(){
                alert('ERROR: servidor conection');
              }
          });
        }
        else{
          alert('Incomplete Form');
          return false;
        }
      }
    </script>
  </head>
  <body>
    <center>
      <div class="top">
        <img src="imgs/logo.png" width="85px" height="85px">
      </div>
      <div class="bar">
        <h1></h1>
      </div>
      <div class="middle">
        <h2><mark>Community Psychology</mark></h2><br>
        <form name="FORMA1" action="FrontEnd/home.php" method="post">
          <div class="form-group">
            <label for="email">Email</label>
            <div class="col">
              <input name="email" type="text" class="form-group mx-sm-3 mb-2" placeholder="example@domain.com">
            </div>
          </div>
          <div class="form-group">
            <label for="pasw">Password</label><br>
            <input type="password" name="pasw" placeholder="********"><br>
          </div>
          <button type="button" class="btn btn-primary" onClick="enviar();">login</button>
        </form>
      </div>
    </center>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
