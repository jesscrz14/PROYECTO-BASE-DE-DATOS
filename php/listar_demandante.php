<?php
include_once("conexion.php");

$sentencia=$bd->query("SELECT * FROM demandante;");
$demandante=$sentencia->fetchAll(PDO::FETCH_OBJ);


?>