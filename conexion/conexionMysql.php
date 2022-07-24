<?php

$con = @mysqli_connect('localhost', 'toroDigital', 'Th54+%2+rmx~', 'toroDigital');
if (!$con) {
    die("imposible conectarse: " . mysqli_error($conTrans));
}
if (@mysqli_connect_errno()) {
    die("Conexión falló: " . mysqli_connect_errno() . " : " . mysqli_connect_error());
}

/*

<?php
  $posts['respuesta'] = array("status" => 1, "msg" => "Api corriendo");
  echo json_encode($posts);
 ?>

 */