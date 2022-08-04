<?php
include("conexion.php");
$con=conectar();


$id_categoria=$_POST['id_categoria'];
$rut_proveedor=$_POST['rut_proveedor'];
$nombre=$_POST['nombre'];
$stock=$_POST['stock'];



$sql="CALL agregar_producto_nuevo ('$rut_proveedor','$id_categoria','$nombre','$stock')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: ingresar_producto.php");
    
}else {
}
?>