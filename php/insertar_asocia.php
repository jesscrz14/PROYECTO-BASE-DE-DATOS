<?php
include_once("conexion.php");
$id_asociacion=$_POST["id_asociacion"];
$dni=$_POST["dni"];
$cod_perfil=$_POST["cod_perfil"];

$sentencia=$bd->prepare("INSERT INTO asocia(id_asociacion, dni, cod_perfil) VALUES(:id_asociacion,:dni,:cod_perfil);");

$sentencia->bindParam(':id_asociacion',$id_asociacion);
$sentencia->bindParam(':dni',$dni);
$sentencia->bindParam(':cod_perfil',$cod_perfil);

if($sentencia->execute()) {
	return header("Location:../views/asocia.php");
}else{
	return "error";
}

?>