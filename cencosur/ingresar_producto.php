<?php 
    date_default_timezone_set('America/Santiago');
    include("conexion.php");
    $con=conectar();
    $fecha = date("Y-m-d");
    $sql="SELECT  producto.id_producto, precio.id_precio, producto.id_categoria, producto.rut_proveedor, producto.nombre, producto.stock, precio.valor, precio.fecha_inicio, precio.fecha_fin
    FROM producto LEFT JOIN precio on 
    producto.id_producto = precio.id_producto where precio.id_precio in (select max(id_precio) from precio group by precio.id_producto) or valor is null  order by producto.id_producto;";
    $query=mysqli_query($con,$sql);
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title> INGRESO DE PRODUCTOS </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    
    <body>
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>INGRESE DATOS DE PRODUCTOS</h1>
                                <form action="insertar_producto.php" method="POST">

                                    <input type="text" class="form-control mb-3" name="id_categoria" placeholder="Ingresar id de categoría">
                                    <input type="text" class="form-control mb-3" name="rut_proveedor" placeholder="Ingresar rut proveedor (sin puntos y con gruión)">
                                    <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre">
                                    <input type="text" class="form-control mb-3" name="stock" placeholder="Stock a ingresar">
                                    
                                    <input type="submit" class="btn btn-primary">
                                    <a class="btn btn-primary" href= "home.php">Regresar</a>
                                </form>
                        </div>

                        <div class="col-md-8">
                            <table class="table" >
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>ID PRODUCTO</th>
                                        <th>ID CATEGORÍA</th>
                                        <th>RUT PROVEEDOR</th>
                                        <th>NOMBRE</th>
                                        <th>STOCK</th>
                                        <th>VALOR</th>
                                        <th>FECHA INICIO</th>
                                        <th>FECHA FIN</th>
                                        <TH></TH>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody> 

                                        <?php
                                                                                 
                                            while($row=mysqli_fetch_array($query)){
                                                
                                        ?>
                                            <tr>
                                                <th><?php  echo $row['id_producto']?></th>
                                                <th><?php  echo $row['id_categoria']?></th>
                                                <th><?php  echo $row['rut_proveedor']?></th>
                                                <th><?php  echo $row['nombre']?></th>
                                                <th><?php  echo $row['stock']?></th>    
                                                <th><?php  echo $row['valor']?></th>   
                                                <th><?php  echo $row['fecha_inicio']?></th>   
                                                <th><?php  echo $row['fecha_fin']?></th>   
                                                <th><a href="actualizar_producto.php?id=<?php echo $row['id_producto'] ?>" class="btn btn-info">Editar</a></th>
                                                <th><a href="ingresar_stock_html.php?id=<?php echo $row['id_producto'] ?>" class="btn btn-info">Ingresar stock</a></th>
                                                <th><a href="ingresar_precio.php?id=<?php echo $row['id_producto'] ?>" class="btn btn-info">Ingresar precio</a></th>                                      
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                    </div>  
            </div>
    </body>
</html>