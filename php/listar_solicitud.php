<?php
include_once("conexion.php");

$sentencia=$bd->query("SELECT * FROM solicita;");
$solicitud=$sentencia->fetchAll(PDO::FETCH_OBJ);


?>