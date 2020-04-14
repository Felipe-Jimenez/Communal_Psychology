<?php
define("HOST", 'localhost');
define("BD", 'proyecto_psicologia');
define("USER_BD", 'root');
define("PASS_BD", '');

function conecta(){
    if(!($con = mysqli_connect(HOST, USER_BD, PASS_BD, BD))){//establece la funcion al servidor
      echo "ERROR CONECTANDO AL SERVIDOR BD";
      exit();
    }
      return $con;
}
?>
