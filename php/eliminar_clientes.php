<?php  

include_once("conexion.php");

$cod_cliente=$_POST["cod_cliente"];

$sentencia=$bd->prepare("DELETE FROM cliente WHERE cod_cliente=:cod_cliente");
$sentencia->bindParam(':cod_cliente', $cod_cliente);

if($sentencia->execute()){
	return header("Location:../views/clientes.php");
}else{
	return "error";
}

?>