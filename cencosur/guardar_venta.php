<?php

include("conexion.php");
$con=conectar();

$id_venta=$_POST['id_venta'];
$descuento=$_POST['descuento'];


$sql="CALL total('$id_venta','$descuento')";
$query= mysqli_query($con,$sql);
if($query){
    header('Location: http://localhost/CENCOSUR/agregar_producto.php?id='.$id_venta);
    
}else {
}

?>