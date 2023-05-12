<?php

@include '../config.php';

session_start();

if(!isset($_SESSION['empleado_name'])){
   header('location:../login_form.php');
}

$id = $_GET['id'];

$sql=" SELECT * FROM cliente_form WHERE id = '$id' ";
$query=mysqli_query($conn, $sql);

$row=mysqli_fetch_array($query);

?>

<!-------------------- HTML ------------------------->
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Actualizar Cliente</title>

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

        <div class="form-container">
            <form class="registro" action="actualizar_cliente.php" method="POST">
                <h3>Actualizar Cliente</h3>
                <?php
                if(isset($error)){
                    foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
                ?>            
                <input type="hidden" name="id" required placeholder="id_cliente" value="<?php echo $row['id']?>">

                <input type="text" name="nombre" required placeholder="Nombre" value="<?php echo $row['nombre']?>">
                <input type="text" name="apellidos" required placeholder="Apellidos" value="<?php echo $row['apellidos']?>">
                <input type="date" name="fecha_nam" min="1922-01-01" max="2003-12-31" value="<?php echo $row['fecha_nam']?>">
                <input type="text" name="curp" required placeholder="CURP" value="<?php echo $row['curp']?>">
                <input type="text" name="domicilio" required placeholder="Domicilio" value="<?php echo $row['domicilio']?>">
                <input type="text" name="codigo_postal" required placeholder="Codigo Postal" value="<?php echo $row['codigo_postal']?>">
                <input type="tel" name="telefono" required placeholder="Telefono" value="<?php echo $row['telefono']?>">
                <input type="email" name="email" required placeholder="Correo Electronico" value="<?php echo $row['email']?>">
                <select name="paquete_type">
                    <option value="80 canales HD">Paquete 80 canales HD</option>
                    <option value="500 canales HD">Paquete 500 canales HD</option>
                </select>
                <input type="submit" name="submit" value="Actualizar" class="form-btn">
                <a class="btn_regresar" href="consultar_cliente.php">Regresar</a></p>
            </form>
        </div>
   </div>

   <script src="../js/main.js"></script>

</body>
</html>
