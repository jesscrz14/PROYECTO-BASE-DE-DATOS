<?php
include_once("conexion.php");
$id_cv=$_POST["id_cv"];
$titulo=$_POST["titulo"];
$especialidad=$_POST["especialidad"];
$universidad=$_POST["universidad"];

$sentencia=$bd->prepare("UPDATE curriculum SET titulo= :titulo, especialidad= :especialidad, universidad= :universidad WHERE id_cv= :id_cv;");

$sentencia->bindParam(':id_cv',$id_cv);
$sentencia->bindParam(':titulo',$titulo);
$sentencia->bindParam(':especialidad',$especialidad);
$sentencia->bindParam(':universidad',$universidad);

if($sentencia->execute()) {
	return header("Location:../views/curriculum.php");
}else{
	return "error";
}

?>