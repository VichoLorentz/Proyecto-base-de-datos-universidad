<?php

include("conexion.php");
$con=conectar();

$rut_cliente=$_POST['rut_cliente'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$calle=$_POST['calle'];
$num_calle=$_POST['num_calle'];
$comuna=$_POST['comuna'];
$region=$_POST['region'];


$sql="UPDATE cliente SET  nombre='$nombre',apellido='$apellido',email='$email'
,calle = '$calle', num_calle = '$num_calle' , comuna = '$comuna', region = '$region'
WHERE rut_cliente='$rut_cliente'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: cliente.php");
    }
?>