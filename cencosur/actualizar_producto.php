<?php 
    include("conexion.php");
    $con=conectar();

$id_producto=$_GET['id'];

$sql="SELECT * FROM producto WHERE id_producto='$id_producto'";
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
        <title>Actualizar producto</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
        <br>
        <h1> <center>Actualizar producto</center> </h1>
                <div class="container mt-5">
                    <form action="update_producto.php" method="POST">
                                                  
                                <input type="text" class="form-control mb-3" name="id_producto" placeholder="ID PRODUCTO" value="<?php echo $row['id_producto']  ?>">
                                <input type="text" class="form-control mb-3" name="id_categoria" placeholder="ID CATEGORÍA" value="<?php echo $row['id_categoria']  ?>">
                                <input type="text" class="form-control mb-3" name="rut_proveedor" placeholder="ID PROVEEDOR" value="<?php echo $row['rut_proveedor']  ?>">
                                <input type="text" class="form-control mb-3" name="nombre" placeholder="NOMBRE" value="<?php echo $row['nombre']  ?>">
                                <input type="text" class="form-control mb-3" name="stock" placeholder="STOCK" value="<?php echo $row['stock']  ?>">

                            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
                    </form>
                    
                </div>
    </body>
</html>