<?php
header('Access-Control-Allow-Origin: *');
$http_origin = $_SERVER['HTTP_ORIGIN'];
$allowed_domains = array(
    'http://localhost:80/',
    'http://localhost'
);

if (in_array($http_origin, $allowed_domains)) {
    header("Access-Control-Allow-Origin: $http_origin");
}
require dirname(__FILE__) . '/../models/Operacion.php';
header("Content-Type:application/json");

$posts = array();

switch ($_SERVER['REQUEST_METHOD']) {
    case 'GET':
        $operacionObj = new Operacion();
        $resul = $operacionObj->findAll();
        if (count($resul) > 0) {
            $json = [];
            for ($i = 0; $i < count($resul); $i++) {
                array_push($json, $resul[$i]);
            }
            $posts  = array("status" => 1, "data" => $resultadoOperacion, "msg" => "Se agrego el registro");
        } else {
            $posts = array("status" => 0, "msg" => "no ahy registro");
        }
        break;
    case 'POST':

        $jsonReqUrl = "php://input";
        $reqjson = file_get_contents($jsonReqUrl);
        $reqjsonDecode = json_decode($reqjson, true);

        $num1 =  $reqjsonDecode['numero1'];
        $num2 =  $reqjsonDecode['numero2'];
        $operacion =  $reqjsonDecode['operacion'];
        $resultadoOperacion = resultado($num1, $num2, $operacion);
        $data = array(
            'n1' => $num1,
            'n2' => $num2,
            'result' => $resultadoOperacion,
            'operacion' => $operacion,
            'date' =>  date("Y-m-d H:i:s")
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
