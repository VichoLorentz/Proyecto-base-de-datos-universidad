
<?php 
    include("conexion.php");
    $con=conectar();
    

    date_default_timezone_set('America/Santiago');
    $id_venta=$_GET['id'];


    $sql="SELECT * from detallar where id_venta= '$id_venta'";
    $query=mysqli_query($con,$sql);

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
                                                                                 
                                            while($row=mysqli_fetch_array($query)){
                                                
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
                            <center><a  class="btn btn-primary" href= "cliente.php">Volver</a></center>    
                    </div>  
            </div>
    </body>
</html>
