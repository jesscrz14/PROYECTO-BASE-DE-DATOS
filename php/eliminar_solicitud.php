<?php  

include_once("conexion.php");

$id_solicitud=$_POST["id_solicitud"];

$sentencia=$bd->prepare("DELETE FROM solicita WHERE id_solicitud=:id_solicitud");
$sentencia->bindParam(':id_solicitud', $id_solicitud);

if($sentencia->execute()){
	return header("Location:../views/solicitud.php");
}else{
	return "error";
}

?>