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
        <title>INGRESAR PRECIO</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
        <br>
        <h1> <center>Ingresar Precio</center> </h1>
                <div class="container mt-5">
                    <form action="ingresar_precio_funcion.php" method="POST">
                                <div class ="row d-flex justify-content-center"><div class = "col-md-2">ID PRODUCTO</div><div class = "col-md-2"><input type="text" class="form-control mb-3" name="id_producto" placeholder="ID PRODUCTO" value="<?php echo $row['id_producto']  ?>"readonly ></div></div>                 
                                <div class ="row d-flex justify-content-center"><div class = "col-md-2">ID CATEGORÍA</div><div class = "col-md-2"><input type="text" class="form-control mb-3" name="id_categoria" placeholder="ID CATEGORÍA" value="<?php echo $row['id_categoria']  ?>"readonly ></div></div>
                                <div class ="row d-flex justify-content-center"><div class = "col-md-2">RUT PROVEEDOR</div><div class = "col-md-2"><input type="text" class="form-control mb-3" name="rut_proveedor" placeholder="RUT PROVEEDOR" value="<?php echo $row['rut_proveedor']  ?>"readonly ></div></div>
                                <div class ="row d-flex justify-content-center"><div class = "col-md-2">NOMBRE ARTÍCULO</div><div class = "col-md-2"><input type="text" class="form-control mb-3" name="nombre" placeholder="NOMBRE" value="<?php echo $row['nombre']  ?>"readonly ></div></div>
                                <div class ="row d-flex justify-content-center"><div class = "col-md-2">STOCK</div><div class = "col-md-2"><input type="text" class="form-control mb-3" name="stock" placeholder="STOCK" value="<?php echo $row['stock']  ?>"readonly ></div></div>
                                <div class ="row d-flex justify-content-center"><div class = "col-md-2">VALOR A AGREGAR</div><div class = "col-md-2"><input type="text" class="form-control mb-3" name="valor" placeholder="Ingrese valor"?></div></div>
                                <div class ="row d-flex justify-content-center"><div class = "col-md-2">FECHA DE INICIO</div><div class = "col-md-2"><input type="text" class="form-control mb-3" name="fecha_inicio" placeholder="Formato (1999-12-31)"?></div></div>
                                <div class ="row d-flex justify-content-center"><div class = "col-md-2">FECHA FIN</div><div class = "col-md-2"><input type="text" class="form-control mb-3" name="fecha_fin" placeholder="Formato (1999-12-31)"?></div></div>
                                

                                <CENTER><input type="submit" class="btn btn-primary btn-block " value="Agregar"></CENTER>
                    </form>
                    
                </div>
    </body>
</html>