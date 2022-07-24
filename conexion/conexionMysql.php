<?php
/*
$con = pg_connect("host=localhost dbname=edb user=enterprisedb password=postgres");
if (!$con) {
    die("imposible conectarse: " . mysqli_error($conTrans));
}
if (@mysqli_connect_errno()) {
    die("Conexión falló: " . mysqli_connect_errno() . " : " . mysqli_connect_error());
}

*/
$con = pg_connect("postgres://mmnpfoqj:lmAT2GAKB-mOSgqtSanFS9oLPW6h0mbE@rajje.db.elephantsql.com/mmnpfoqj");
var_dump($con);
if ($con) { 
    echo 'Conexion ok.';
} else {

    echo 'Conexion fallida.';
}


/*

<?php
  $posts['respuesta'] = array("status" => 1, "msg" => "Api corriendo");
  echo json_encode($posts);
 ?>

 */