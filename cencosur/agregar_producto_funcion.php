<?php

include("conexion.php");
$con=conectar();

$id_venta=$_POST['id_venta'];
$id_producto = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];

$sql="CALL agregar_producto('$id_venta','$id_producto','$cantidad')";
$query= mysqli_query($con,$sql);
if($query){
    header('Location: http://localhost/CENCOSUR/agregar_producto.php?id='.$id_venta);
    
}else {
}

?>