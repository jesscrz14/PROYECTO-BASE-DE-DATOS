<?php
include_once("conexion.php");

$sentencia=$bd->query("SELECT * FROM perfil;");
$perfil=$sentencia->fetchAll(PDO::FETCH_OBJ);


?>