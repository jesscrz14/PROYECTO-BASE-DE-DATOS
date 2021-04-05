<?php
include 'conexion.php';



try{
    
  
    $sentencia=$bd->prepare("CALL au_insexperiencia(:id, :e, :i, :f, :p, :d)");
    $sentencia->bindParam(':id', $_POST['id_exp']);
    $sentencia->bindParam(':e', $_POST['nom_empresa']);
    $sentencia->bindParam(':i', $_POST['tiempo_inicio']);
    $sentencia->bindParam(':f', $_POST['tiempo_fin']);
    $sentencia->bindParam(':p', $_POST['puesto']);
    $sentencia->bindParam(':d', $_POST['dni']);
    $sentencia->execute();  
    header("Location: ../views/procedimiento_almacenado.php");
exit();
}catch(PDOException $e){
    echo"ERROR";
}
