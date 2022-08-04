<?php
include("conexion.php");
$con=conectar();

$rut_cliente=$_POST['rut_cliente'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$calle=$_POST['calle'];
$num_calle=$_POST['num_calle'];
$comuna=$_POST['comuna'];
$region=$_POST['region'];
$email=$_POST['email'];
$fecha_registro=$_POST['fecha_registro'];


$sql="INSERT INTO cliente VALUES('$rut_cliente','$nombre','$apellido',
'$email','$calle','$num_calle','$comuna','$region','$fecha_registro')";
$query= mysqli_query($con,$sql);

if($query){
    Header("Location: cliente.php");
    
}else {
}
?>