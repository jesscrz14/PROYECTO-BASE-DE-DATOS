<?php
include_once("conexion.php");
$id_exp=$_POST["id_exp"];
$nom_empresa=$_POST["nom_empresa"];
$tiempo_inicio=$_POST["tiempo_inicio"];
$tiempo_fin=$_POST["tiempo_fin"];
$puesto=$_POST["puesto"];
$dni=$_POST["dni"];

$sentencia=$bd->prepare("UPDATE experiencia SET nom_empresa= :nom_empresa, tiempo_inicio= :tiempo_inicio, tiempo_fin= :tiempo_fin, puesto= :puesto, dni= :dni WHERE id_exp= :id_exp;");

$sentencia->bindParam(':id_exp',$id_exp);
$sentencia->bindParam(':nom_empresa',$nom_empresa);
$sentencia->bindParam(':tiempo_inicio',$tiempo_inicio);
$sentencia->bindParam(':tiempo_fin',$tiempo_fin);
$sentencia->bindParam(':puesto',$puesto);
$sentencia->bindParam(':dni',$dni);

if($sentencia->execute()) {
	return header("Location:../views/experiencia.php");
}else{
	return "error";
}

?>