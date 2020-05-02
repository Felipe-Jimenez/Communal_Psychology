<?php
    require "conection.php";
    $con = conecta();
    #id from comunity what i ignore persons
    $idC = $_GET['idC'];

    $sql = "SELECT * FROM Persona WHERE curp NOT IN (SELECT curp FROM Persona join Rol on id_comunidad=$idC and curp=id_persona) ORDER BY nombre";
    $res = mysqli_query($con, $sql);

?>
<button class="btn btn-primary btn-sm" onClick="reload();">Close</button>
<table class="table table-sm" style="margin-top:5px;">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col"></th>
    </tr>
  </thead>
    <tbody>
    <?php
      $i = 1;
      while($num = mysqli_fetch_assoc($res)){
        $curp = $num['curp'];
        $name = $num['nombre'];
        echo "<tr id='$curp'>
                <th scope=\"row\">$i</th>
                <td>$name</td>
                <td><button type=\"button\" class=\"btn btn-warning btn-sm\" onClick=\"agregar('$curp','$idC');\">Add</button></td>
              </tr>";
        $i += 1;
      }
    ?>
  </tbody>
</table>
