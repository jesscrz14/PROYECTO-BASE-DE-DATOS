<?php
include_once("conexion.php");
$cod_cliente=$_POST["cod_cliente"];
$cif=$_POST["cif"];
$nombre=$_POST["nombre"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$num_fax=$_POST["num_fax"];

$sentencia=$bd->prepare("INSERT INTO cliente(cod_cliente, cif, nombre, direccion, telefono, num_fax) VALUES(:cod_cliente,:cif,:nombre,:direccion,:telefono,:num_fax);");

$sentencia->bindParam(':cod_cliente',$cod_cliente);
$sentencia->bindParam(':cif',$cif);
$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':telefono',$telefono);
$sentencia->bindParam(':num_fax',$num_fax);

if($sentencia->execute()) {
	return header("Location:../views/clientes.php");
}else{
	return "error";
}

?>