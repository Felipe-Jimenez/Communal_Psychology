<?php
if(empty($_SESSION['id'])){
  $id = "";
  $name = "";
}
else{
  $id = $_SESSION['id'];
  $name = $_SESSION['name'];
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">

<head>
  <meta charset="utf-8">
  <title></title>
  <meta name"viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <style media="screen">
    *{
      margin: 0;
    }
    body{
      background-color: #f2f2f2;
    }
    .leftBar{
      float: left;
      width: 10%;
      height: 100%;
    }
  </style>
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="anclArriba">
    <a class="navbar-brand" href="home.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="admin_view.php">Profile</a>
        </li>
      </ul>
    </div>
    <nav class="navbar navbar-brand">
      <?php echo $name; ?>
    </nav>
    <a href="../BackEnd/destroy.php" class="btn btn-outline-warning btn-sm">log out</a>
  </nav>

  <script src="../js/jquery-3.3.1.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>

</html>
