<?php  

include_once("conexion.php");

$id_cv=$_POST["id_cv"];

$sentencia=$bd->prepare("DELETE FROM curriculum WHERE id_cv=:id_cv");
$sentencia->bindParam(':id_cv', $id_cv);

if($sentencia->execute()){
	return header("Location:../views/curriculum.php");
}else{
	return "error";
}

?>