<?php

class Operacion
{
    private $conexion;
    private $query;

    function __construct()
    {
        require dirname(__FILE__) . '/../config/conexionMysql.php';
        $this->conexion = $con;
        $this->conexion->query('set name "utf8"');
    }

    public function Aggregate($_m)
    {
        $query = "insert into operacion values(0," . $_m['n1'] . "," . $_m['n2'] . "," . $_m['result'] . "," . $_m['date'] . ")";
        var_dump($query);
        $resultSet = $this->conexion->query($query);
        return $resultSet;
    }

    public function findAll()
    {
        $query = "select numero1,numero2,resultado,fecha from operacion";
        $resultSet = $this->conexion->query($query);
        return $resultSet;
    }
}
