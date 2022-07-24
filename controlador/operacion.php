<?php

/*header('Access-Control-Allow-Origin: *');
$http_origin = $_SERVER['HTTP_ORIGIN'];
$allowed_domains = array(
    'http://localhost:80/',
    'http://localhost'
);

if (in_array($http_origin, $allowed_domains)) {
    header("Access-Control-Allow-Origin: $http_origin");
}
*/
require dirname(__FILE__) . '/../modelo/Operacion.php';
header("Content-Type:application/json");

$posts = array();
$json = array();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $operacionObj = new Operacion();
        $resul = $operacionObj->findAll();
        while ($row = pg_fetch_row($resul)) {
            array_push($json, $row);
        }
        if (count($json) > 0) {
            $posts  = array("status" => 1, "data" => $json, "msg" => "encontro la informacion ");
        } else {
            $posts = array("status" => 0, "msg" => "no hay registros");
        }
        break;
    case 'POST':
        $date = new DateTime("now", new DateTimeZone('America/Bogota'));

        $num1 =  $_POST['numero1']; 
        $num2 =  $_POST['numero2'];
        $operacion =  $_POST['operacion'];
        $resultadoOperacion = resultado($num1, $num2, $operacion);
        $data = array(
            'n1' => $num1,
            'n2' => $num2,
            'result' => $resultadoOperacion,
            'op' => $operacion,
            'date' => $date->format('Y-m-d H:i:s')  
        );
        $operacionObj = new Operacion();
        $resul = $operacionObj->Aggregate($data);
        if ($resul) {
            $posts  = array("status" => 1, "data" => $resultadoOperacion, "msg" => "Se agrego el registro");
        } else {
            $posts = array("status" => 0, "msg" => "No se agrego");
        }
        break;
}

echo json_encode($posts);

function resultado($n1, $n2, $op)
{
    $resul = 0;
    switch ($op) {
        case 'mas':
            $resul = $n1 + $n2;
            break;
        case 'menos':
            $resul = $n1 - $n2;
            break;
        case 'por':
            $resul = $n1 * $n2;
            break;
        case 'dividir':
            $resul = $n1 / $n2;
            break;
    }
    return $resul;
}
