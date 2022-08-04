<?php

include("conexion.php");
$con=conectar();

$rut_cliente=$_GET['id'];

$sql="CALL crear_venta ('$rut_cliente')";
$query= mysqli_query($con,$sql);
$sql2="SELECT * FROM venta ORDER by id_venta DESC LIMIT 1";
$query2=mysqli_query($con,$sql2);

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <title>Venta creada</title>
</head>
  
        
    <body>    
        <center><h1>Se ha creado la venta con éxito</h1></center>
        <br>
        <br>
        
        <center><a href="agregar_producto.php?id=<?php echo $row=mysqli_fetch_array($query2)['id_venta']?>"class="btn btn-primary">Continuar con la venta</a></center>
    <body>
  
</html>