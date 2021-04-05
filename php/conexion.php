<?php

$password="";
$usuario="root";
$nombrebd="mito";

try {
	$bd = new PDO (
		'mysql:host=localhost;
		dbname='.$nombrebd,
		$usuario,
		$password);
	//echo "LA CONEXION SE REALIZO CORRECTAMENTE :)";

} catch (Exception $e){
	echo "LA CONEXION NO PUDO REALIZARSE :(".$e->getMessage();
}

?>