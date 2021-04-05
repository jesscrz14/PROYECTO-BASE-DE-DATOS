<?php
include_once("conexion.php");

$sentencia=$bd->query("SELECT * FROM curriculum;");
$curriculum=$sentencia->fetchAll(PDO::FETCH_OBJ);


?>