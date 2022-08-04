
<?php 
    include("conexion.php");
    $con=conectar();
    

    date_default_timezone_set('America/Santiago');
    $id_venta=$_GET['id'];
    $fecha = date("Y-m-d");
    $sql="SELECT  producto.id_producto, producto.id_categoria, producto.rut_proveedor, producto.nombre, producto.stock, precio.valor, precio.fecha_inicio, precio.fecha_fin
    FROM producto LEFT JOIN precio on 
    producto.id_producto = precio.id_producto WHERE '$fecha' between fecha_inicio and fecha_fin and stock > 0 order by producto.id_producto;
    ";
    $query=mysqli_query($con,$sql);
    $sql2="SELECT * from detallar where id_venta= '$id_venta'";
    $query2=mysqli_query($con,$sql2);
    $sql3="SELECT * from venta where id_venta = '$id_venta'";
    $query3 = mysqli_query($con,$sql3)
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> AGREGAR PRODUCTOS </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
            <div class="container mt-5">
                    <div class="row"> 
                        
                        <div class="col-md-3">
                            <h1>AGREGAR PRODUCTOS</h1>
                                <form action = "agregar_producto_funcion.php"  method="POST">

                                    <input type="text" class="form-control mb-3" name="id_venta" placeholder="ID PRODUCTO" value="<?php echo $id_venta  ?>"readonly>
                                    <input type="text" class="form-control mb-3" name="id_producto" placeholder="Ingresar id producto">
                                    <input type="text" class="form-control mb-3" name="cantidad" placeholder="Ingresar cantidad">
                                    
                                    
                                    <input type="submit" class="btn btn-primary" " ? >
                                    <a class="btn btn-primary" href= "cliente.php">Regresar</a>
                                    
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
                                        
                                        <th></th>
                                        
                                    </tr>
                                </thead>

                                <tbody> 
                                        <h1>Productos disponibles</h1>
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
                                                                                      
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="container">
                         <div class="row justify-content-center">
                            <div class="col-auto mt-5">
                                <table class="table" >
                                 
                                <thead class="table-success table-striped" >
                                    <tr>
                                        <th>ID VENTA</th>
                                        <th>ID PRODUCTO</th>
                                        <th>CANTIDAD</th>
                                        <th>VALOR UNITARIO</th>
                                        <th>VALOR TOTAL</th>
                                        
                                        
                                        <th></th>
                                        
                                    </tr>
                                </thead>

                                <tbody> 
                                    <center><h1>Detalle de compra</h1></center>
                                        <?php
                                                                                 
                                            while($row=mysqli_fetch_array($query2)){
                                                
                                        ?>
                                            
                                            <tr>
                                                <th><?php  echo $row['id_venta']?></th>
                                                <th><?php  echo $row['id_producto']?></th>
                                                <th><?php  echo $row['cantidad']?></th>
                                                <th><?php  echo $row['Valor_unitario']?></th>
                                                <th><?php  echo $row['valor_total']?></th>    
                                                
                                                                                      
                                            </tr>
                                        <?php 
                                            }
                                        ?>
                                </tbody>
                            </table>
                            <br>
                            </div>
                            </div>
                            </div>
                                <form  action = "guardar_venta.php"  method="POST">
                                <input type="hidden" class="form-control mb-3" name="id_venta" placeholder="ID PRODUCTO" value="<?php echo $id_venta  ?>"readonly>
                                <div class ="row d-flex justify-content-center"><div class = "col-md-2">Descuento</div><div class = "col-md-3"><input type="float" class="form-control mb-3" name="descuento" placeholder="Ingresar descuento en decimal"?></div></div>
                                
                                <center><input type="submit" class="btn btn-primary"></center>
                                </form>
                                <br>
                        </div>
                        <div class="container">
                         <div class="row justify-content-center">
                            <div class="col-auto mt-5">
                                <table class="table" >
                                 <thead class="table-success table-striped" >
                                    <center><h1>Resumen de compra</h1></center>
                                    <TR>
                                        <th>ID VENTA</th>
                                        <th>FECHA</th>
                                        <th>DESCUENTO</th>
                                        <th>MONTO TOTAL</th>
                                        <th>RUT CLIENTE</th>
                                    </TR>
                                    </thead>
                                    <?php 
                                    while($row=mysqli_fetch_array($query3)){
                                    ?>
                                        <th><?php  echo $row['id_venta']?></th>
                                        <th><?php  echo $row['fecha']?></th>
                                        <th><?php  echo $row['descuento']?></th>
                                        <th><?php  echo $row['monto_total']?></th>
                                        <th><?php  echo $row['rut_cliente']?></th>  
                                        <?php 
                                    }
                                    ?>
                                </div> 
                        </div> 
                    </div>  
            </div>
    </body>
</html>
