<?php
session_start();
//IF SESSIO WAS CREATE
if(empty($_SESSION['id']))
  header("location: ../index.php");

require "styles.php";

$curp = $_REQUEST['id'];
echo $curp;
?>
