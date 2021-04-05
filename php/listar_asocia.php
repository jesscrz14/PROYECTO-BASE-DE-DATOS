<?php
include_once("conexion.php");

$sentencia=$bd->query("SELECT * FROM asocia;");
$asocia=$sentencia->fetchAll(PDO::FETCH_OBJ);


?>