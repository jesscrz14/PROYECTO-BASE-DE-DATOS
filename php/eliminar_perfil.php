<?php  

include_once("conexion.php");

$cod_perfil=$_POST["cod_perfil"];

$sentencia=$bd->prepare("DELETE FROM perfil WHERE cod_perfil=:cod_perfil");
$sentencia->bindParam(':cod_perfil', $cod_perfil);

if($sentencia->execute()){
	return header("Location:../views/perfil.php");
}else{
	return "error";
}

?>