<?php

include("conexion.php");
$con=conectar();

$id_producto=$_POST['id_producto'];
$id_categoria=$_POST['id_categoria'];
$rut_proveedor=$_POST['rut_proveedor'];
$nombre=$_POST['nombre'];
$stock=$_POST['stock'];


$sql="UPDATE producto SET  id_producto='$id_producto',id_categoria='$id_categoria',rut_proveedor='$rut_proveedor'
,nombre = '$nombre', stock = '$stock' 
WHERE id_producto='$id_producto'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: ingresar_producto.php");
    }
?>