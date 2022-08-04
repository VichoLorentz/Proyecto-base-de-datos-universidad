<?php

include("conexion.php");
$con=conectar();

$id_producto=$_POST['id_producto'];
$stock = $_POST['stock'];

$sql="CALL agregar_stock('$id_producto','$stock')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: ingresar_producto.php");
}else {
}
?>