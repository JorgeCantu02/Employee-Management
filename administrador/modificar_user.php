<?php

@include '../config.php';

session_start();

if(!isset($_SESSION['administrador_name'])){
   header('location:../login_form.php');
}


$id = $_GET['id'];

$sql=" SELECT * FROM user_form WHERE id = '$id' ";
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
   <title>Actualizar Empleado</title>

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
               <a class="btn1" href="admin_page.php">Inicio</a>
               <a class="btn1" href="registrar_user.php">Registrar Empleado</a>
               <a class="btn1" href="consultar_user.php">Consultar Empleados</a>
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
         <form class="registro" action="actualizar_user.php" method="post">
            <h3>Actualizar Empleado</h3>
            <?php
            if(isset($error)){
               foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
               };
            };
            ?>
            <input type="hidden" name="id" required placeholder="ID Empleado" value="<?php echo $row['id']?>">

            <input type="text" name="nombre" required placeholder="Nombre" value="<?php echo $row['nombre']?>">
            <input type="text" name="apellidos" required placeholder="Apellidos" value="<?php echo $row['apellidos']?>">
            <input type="text" name="num_social" required placeholder="Numero social" value="<?php echo $row['num_social']?>">
            <input type="tel" name="telefono" required placeholder="Telefono" value="<?php echo $row['telefono']?>">
            <input type="email" name="email" required placeholder="Correo electronico" value="<?php echo $row['email']?>">
            <input type="date" name="fecha_nam" min="1922-01-01" max="2003-12-31" value="<?php echo $row['fecha_nam']?>">
            <select name="user_type">
               <option value="empleado">Empleado</option>
               <option value="administrador">Administrador</option>
            </select>
            <input type="submit" name="submit" value="Actualizar" class="form-btn">
            <a class="btn_regresar" href="consultar_user.php">Regresar</a></p>
         </form>
      </div>
   </div>
   <script src="../js/main.js"></script>
</body>
</html>