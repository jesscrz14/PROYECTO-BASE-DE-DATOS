<?php
include_once("conexion.php");
$dni=$_POST["dni"];
$nombre=$_POST["nombre"];
$direccion=$_POST["direccion"];
$telefono=$_POST["telefono"];
$cc_conducir=$_POST["cc_conducir"];
$id_cv=$_POST["id_cv"];

$sentencia=$bd->prepare("UPDATE demandante SET nombre= :nombre, direccion= :direccion, telefono= :telefono, cc_conducir= :cc_conducir, id_cv= :id_cv WHERE dni= :dni;");

$sentencia->bindParam(':dni',$dni);
$sentencia->bindParam(':nombre',$nombre);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':telefono',$telefono);
$sentencia->bindParam(':cc_conducir',$cc_conducir);
$sentencia->bindParam(':id_cv',$id_cv);

if($sentencia->execute()) {
	return header("Location:../views/demandante.php");
}else{
	return "error";
}

?>