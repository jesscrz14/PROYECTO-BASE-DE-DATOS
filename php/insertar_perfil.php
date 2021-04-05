<?php
include_once("conexion.php");
$cod_perfil=$_POST["cod_perfil"];
$descripcion=$_POST["descripcion"];

$sentencia=$bd->prepare("INSERT INTO perfil(cod_perfil, descripcion) VALUES(:cod_perfil,:descripcion);");

$sentencia->bindParam(':cod_perfil',$cod_perfil);
$sentencia->bindParam(':descripcion',$descripcion);

if($sentencia->execute()) {
	return header("Location:../views/perfil.php");
}else{
	return "error";
}

?>