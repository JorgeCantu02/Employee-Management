<?php

@include '../config.php';

session_start();

if(!isset($_SESSION['empleado_name'])){
   header('location:../login_form.php');
}

?>

<!-------------------- HTML ------------------------->
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Consultar Cliente</title>

   <!--- Enlace relativo --->
   <link rel="stylesheet" href="http://localhost/proyectoING/test/css/style.css">
   <!--- Enlace absoluto --->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
</head>

<body>
   
   <div class="container1" id="container1">
        <header>
         <nav class="navegadores">
               <img src="../imagenes/logo.png" alt="logo" width="120" height="100">
               <ul class="enlaces_menu">
                    <a class="btn1" href="user_page.php">Inicio</a>
                    <a class="btn1" href="registrar_cliente.php">Registrar Clientes</a>
                    <a class="btn1" href="consultar_cliente.php">Consultar Clientes</a>
                    <a class="btn1" href="../logout.php">Cerrar Sesion</a>
               </ul>

               <button class="ham" type="button">
                     <span class="br-1"></span>
                     <span class="br-2"></span>
                     <span class="br-3"></span>
               </button>
         </nav>
        </header>

        <div class="tabla_cont">
            <table class="tabla">
                <thead class="up_cliente">
                    <tr class="fila">
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Fecha de nacimiento</th>
                        <th>CURP</th>
                        <th>Domicilio</th>
                        <th>Codigo postal</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Paquete</th>
                        <th></th>
                        <th></th>
                    </tr> 
                </thead>

                <?php
                $sql=" SELECT * FROM cliente_form ";
                $resultado = mysqli_query($conn, $sql);

                while($mostrar = mysqli_fetch_array($resultado)){
                ?>

                <tr class="fila">
                    <td><?php echo $mostrar ['id']?></td>
                    <td><?php echo $mostrar ['nombre']?></td>
                    <td><?php echo $mostrar ['apellidos']?></td>
                    <td><?php echo $mostrar ['fecha_nam']?></td>
                    <td><?php echo $mostrar ['curp']?></td>
                    <td><?php echo $mostrar ['domicilio']?></td>
                    <td><?php echo $mostrar ['codigo_postal']?></td>
                    <td><?php echo $mostrar ['telefono']?></td>
                    <td><?php echo $mostrar ['email']?></td>
                    <td><?php echo $mostrar ['paquete_type']?></td>
                    <td><a href="modificar_cliente.php?id=<?php echo $mostrar ['id']?>" class="btn_editar">Editar</a></td>
                    <td><a href="eliminar_cliente.php?id=<?php echo $mostrar ['id']?>" class="btn_eliminar">Eliminar</a></td>
                </tr>
                <?php
                }
                ?>
            </table> 
        </div>
   </div>

   <script src="../js/main.js"></script>

</body>
</html>