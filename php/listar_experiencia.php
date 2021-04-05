<?php
include_once("conexion.php");

$sentencia=$bd->query("SELECT * FROM experiencia;");
$experiencia=$sentencia->fetchAll(PDO::FETCH_OBJ);


?>