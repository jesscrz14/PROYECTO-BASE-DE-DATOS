<?php  

include_once("conexion.php");

$dni=$_POST["dni"];

$sentencia=$bd->prepare("DELETE FROM demandante WHERE dni=:dni");
$sentencia->bindParam(':dni', $dni);

if($sentencia->execute()){
	return header("Location:../views/demandante.php");
}else{
	return "error";
}

?>