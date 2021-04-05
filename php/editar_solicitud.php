<?php
include_once("conexion.php");
$id_solicitud=$_POST["id_solicitud"];
$cod_cliente=$_POST["cod_cliente"];
$cod_perfil=$_POST["cod_perfil"];

$sentencia=$bd->prepare("UPDATE solicita SET cod_cliente= :cod_cliente, cod_perfil= :cod_perfil WHERE id_solicitud= :id_solicitud;");

$sentencia->bindParam(':id_solicitud',$id_solicitud);
$sentencia->bindParam(':cod_cliente',$cod_cliente);
$sentencia->bindParam(':cod_perfil',$cod_perfil);

if($sentencia->execute()) {
	return header("Location:../views/solicitud.php");
}else{
	return "error";
}

?>