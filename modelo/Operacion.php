<?php

class Operacion
{
    private $conexin;
    private $query;

    function __construct()
    {
        require dirname(__FILE__) . '/../conexion/conexionMysql.php';
        $this->conexin = $con;
    }

    public function Aggregate($_m)
    {
        $this->query = "insert into operacion (numero1,numero2,operacion,resultado,fecha) values(" . $_m['n1'] . "," . $_m['n2'] . ",'" . $_m['op'] . "'," . $_m['result'] . ",'" . $_m['date'] . "')";
        $resultSet = pg_query($this->conexin, $this->query);
        return $resultSet;
    }

    public function findAll() 
    {
        $this->query = "select numero1,operacion,numero2,resultado,fecha from operacion"; 
        $resultSet = pg_query($this->conexin, $this->query);
        return $resultSet;
    }
}
