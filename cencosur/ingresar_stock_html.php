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
        <title>INGRESAR STOCK</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
        <br>
        <h1> <center>Ingresar Stock</center> </h1>
                <div class="container mt-5">
                    <form action="ingresar_stock.php" method="POST">
                                <div class ="row d-flex justify-content-center"><div class = "col-md-2">ID PRODUCTO</div><div class = "col-md-2"><input type="text" class="form-control mb-3" name="id_producto" placeholder="ID PRODUCTO" value="<?php echo $row['id_producto']  ?>"readonly ></div></div>                 
                                <div class ="row d-flex justify-content-center"><div class = "col-md-2">ID CATEGORÍA</div><div class = "col-md-2"><input type="text" class="form-control mb-3" name="id_categoria" placeholder="ID CATEGORÍA" value="<?php echo $row['id_categoria']  ?>"readonly ></div></div>
                                <div class ="row d-flex justify-content-center"><div class = "col-md-2">RUT PROVEEDOR</div><div class = "col-md-2"><input type="text" class="form-control mb-3" name="rut_proveedor" placeholder="RUT PROVEEDOR" value="<?php echo $row['rut_proveedor']  ?>"readonly ></div></div>
                                <div class ="row d-flex justify-content-center"><div class = "col-md-2">NOMBRE ARTÍCULO</div><div class = "col-md-2"><input type="text" class="form-control mb-3" name="nombre" placeholder="NOMBRE" value="<?php echo $row['nombre']  ?>"readonly ></div></div>
                                <div class ="row d-flex justify-content-center"><div class = "col-md-2">STOCK A AGREGAR</div><div class = "col-md-2"><input type="text" class="form-control mb-3" name="stock" placeholder="STOCK"?></div></div>
                                

                                <CENTER><input type="submit" class="btn btn-primary btn-block " value="Agregar"></CENTER>
                    </form>
                    
                </div>
    </body>
</html>