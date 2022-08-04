<?php 
    include("conexion.php");
    $con=conectar();

$rut_cliente=$_GET['id'];

$sql="SELECT * FROM cliente WHERE rut_cliente='$rut_cliente'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Actualizar cliente</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
                <div class="container mt-5">
                    <form action="update.php" method="POST">
                    
                                <input type="hidden" name="rut_cliente" value="<?php echo $row['rut_cliente']  ?>">
                                
                                <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']  ?>">
                                <input type="text" class="form-control mb-3" name="apellido" placeholder="Apellido" value="<?php echo $row['apellido']  ?>">
                                <input type="text" class="form-control mb-3" name="email" placeholder="Email" value="<?php echo $row['email']  ?>">
                                <input type="text" class="form-control mb-3" name="calle" placeholder="Calle" value="<?php echo $row['calle']  ?>">
                                <input type="text" class="form-control mb-3" name="num_calle" placeholder="Numero" value="<?php echo $row['num_calle']  ?>">
                                <input type="text" class="form-control mb-3" name="comuna" placeholder="Comuna" value="<?php echo $row['comuna']  ?>">
                                <input type="text" class="form-control mb-3" name="region" placeholder="Región" value="<?php echo $row['region']  ?>">
                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>