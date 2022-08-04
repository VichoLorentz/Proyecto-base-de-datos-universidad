<?php 
    date_default_timezone_set('America/Santiago');
    include("conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM cliente order by fecha_registro desc";
    $query=mysqli_query($con,$sql);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> INGRESO DE CLIENTES </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        
    </head>
    <body>
        <br>
        <br>
        <br>
        <br>
            <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="row">   
                    <div class="col-md-3">
                        <h1>INGRESE DATOS DE CLIENTE</h1>
                            <form action="insertar.php" method="POST">

                                <input type="text" class="form-control mb-3" name="rut_cliente" placeholder="INGRESAR RUT (sin puntos y con guión)">
                                <input type="text" class="form-control mb-3" name="nombre" placeholder="NOMBRE">
                                <input type="text" class="form-control mb-3" name="apellido" placeholder="APELLIDO">
                                <input type="text" class="form-control mb-3" name="email" placeholder="CORREO ELECTRÓNICO">
                                <input type="text" class="form-control mb-3" name="calle" placeholder="CALLE">
                                <input type="text" class="form-control mb-3" name="num_calle" placeholder="NUMERO DE CALLE">
                                <input type="text" class="form-control mb-3" name="comuna" placeholder="COMUNA">
                                <input type="text" class="form-control mb-3" name="region" placeholder="REGIÓN">
                                <input type="hidden" name="fecha_registro" value="<?php echo date('y-m-d')?>">
                                <input type="submit" class="btn btn-primary">
                                <a class="btn btn-primary" href= "home.php">Regresar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>    
            <div class="container">
                         <div class="row justify-content-center">
                            <div class="col-auto mt-5">
                                <table class="table" >
                                    <thead class="table-success table-striped" >
                                        <tr>
                                        <th> <center> RUT </center> </th> 
                                        <th>NOMBRE</th>
                                        <th>APELLIDO</th>
                                        <th> <center>EMAIL</center></th>
                                        <th>CALLE</th>
                                        <th>NÚMERO</th>
                                        <th>COMUNA</th>
                                        <th>REGIÓN</th>
                                        <th> FECHA DE REGISTRO </th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        </tr>
                                    </thead>

                            <tbody>
                                <?php
                                    while($row=mysqli_fetch_array($query)){
                                ?>
                                    <tr>
                                        <th><?php  echo $row['rut_cliente']?></th>
                                        <th><?php  echo $row['nombre']?></th>
                                        <th><?php  echo $row['apellido']?></th>
                                        <th><?php  echo $row['email']?></th>
                                        <th><?php  echo $row['calle']?></th>    
                                        <th><?php  echo $row['num_calle']?></th>
                                        <th><?php  echo $row['comuna']?></th>
                                        <th><?php  echo $row['region']?></th>
                                        <th><?php  echo $row['fecha_registro']?></th>
                                        <th><a href="actualizar.php?id=<?php echo $row['rut_cliente'] ?>" class="btn btn-info">Editar</a></th>
                                        <th><a href="ingresar_venta.php?id=<?php echo $row['rut_cliente'] ?>" class="btn btn-info">Ingresar venta</a></th> 
                                        <th><a href="consultar_ventas.php?id=<?php echo $row['rut_cliente'] ?>" class="btn btn-info">Consultar ventas históricas</a></th> 
                                                                                
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