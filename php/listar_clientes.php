<?php
include_once("conexion.php");

$sentencia=$bd->query("SELECT * FROM cliente;");
$cliente=$sentencia->fetchAll(PDO::FETCH_OBJ);


?>