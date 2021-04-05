<?php  

include_once("conexion.php");

$id_exp=$_POST["id_exp"];

$sentencia=$bd->prepare("DELETE FROM experiencia WHERE id_exp=:id_exp");
$sentencia->bindParam(':id_exp', $id_exp);

if($sentencia->execute()){
	return header("Location:../views/experiencia.php");
}else{
	return "error";
}

?>