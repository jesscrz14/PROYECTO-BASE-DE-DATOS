<?php  

include_once("conexion.php");

$id_asociacion=$_POST["id_asociacion"];

$sentencia=$bd->prepare("DELETE FROM asocia WHERE id_asociacion=:id_asociacion");
$sentencia->bindParam(':id_asociacion', $id_asociacion);

if($sentencia->execute()){
	return header("Location:../views/asocia.php");
}else{
	return "error";
}

?>