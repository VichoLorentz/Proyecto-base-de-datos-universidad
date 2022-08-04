<?php

include("conexion.php");
$con=conectar();

$id_producto=$_POST['id_producto'];
$valor = $_POST['valor'];
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

$sql="CALL agregar_precio('$id_producto','$valor','$fecha_inicio','$fecha_fin')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: ingresar_producto.php");
}else {
}
?>