<?php 
    include("conexion.php");
    $con=conectar();

$rut_cliente=$_GET['id'];

$sql="SELECT * FROM venta WHERE rut_cliente='$rut_cliente'";
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
        <Center><h1>VENTAS HISTORICAS</h1></CEnter>
        <br>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-auto mt-5">
                <table class="table" >
                    <thead class="table-success table-striped" >
                    
                        <tr>
                        
                            <th>RUT</th> 
                            <th>ID VENTA</th>
                            <th>FECHA DE COMPRA</th>
                            <th>DESCUENTO</th>
                            <th>MONTO TOTAL</th>
                            <th></th>
                        
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                            while($row=mysqli_fetch_array($query)){
                        ?>
                            <tr>
                                <th><?php  echo $row['rut_cliente']?></th>
                                <th><?php  echo $row['id_venta']?></th>
                                <th><?php  echo $row['fecha']?></th>
                                <th><?php  echo $row['descuento']?></th>
                                <th><?php  echo $row['monto_total']?></th>  
                                <th><a href="detalle_venta.php?id=<?php echo $row['id_venta'] ?>" class="btn btn-info">Ver detalle</a></th>  

            
                        </tr>
                        <?php 
                            }
                        ?>
                    </tbody>
                </table>
                <center><a  class="btn btn-primary" href= "cliente.php">Volver</a></center>    
        </div>
        </div>
        </div>
</body>
</html>