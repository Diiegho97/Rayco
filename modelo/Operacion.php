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
        /*$this->query = "insert into operacion (numero1,numero2,operacion,resultado,fecha) values(" . $_m['n1'] . "," . $_m['n2'] . "," . $_m['op'] . "," . $_m['result'] . "," . $_m['date'] . ")";
        $resultSet = $this->conexin->query($this->query);
        return $resultSet; */
    }

    public function findAll() 
    {
        $this->query = "select numero1,numero2,operacion,resultado,fecha from operacion";
        $resultSet = $this->conexin->query($this->query);
        return $resultSet;
    }
}
