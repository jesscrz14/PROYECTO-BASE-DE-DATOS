<?php
include_once("conexion.php");
$id_solicitud=$_POST["id_solicitud"];
$cod_cliente=$_POST["cod_cliente"];
$cod_perfil=$_POST["cod_perfil"];


$sentencia=$bd->prepare("INSERT INTO solicita(id_solicitud, cod_cliente, cod_perfil) VALUES(:id_solicitud,:cod_cliente,:cod_perfil);");

$sentencia->bindParam(':id_solicitud',$id_solicitud);
$sentencia->bindParam(':cod_cliente',$cod_cliente);
$sentencia->bindParam(':cod_perfil',$cod_perfil);

if($sentencia->execute()) {
	return header("Location:../views/solicitud.php");
}else{
	return "error";
}

?>