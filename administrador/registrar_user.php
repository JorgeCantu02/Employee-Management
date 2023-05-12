<?php

@include '../config.php';

session_start();

if(!isset($_SESSION['administrador_name'])){
   header('location:../login_form.php');
}

// -------------Form Registrar Empleado------------------

if(isset($_POST['submit'])){

   $id = mysqli_real_escape_string($conn, $_POST['id']);
   $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
   $apellidos = mysqli_real_escape_string($conn, $_POST['apellidos']);
   $num_social = mysqli_real_escape_string($conn, $_POST['num_social']);
   $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $fecha_nam = mysqli_real_escape_string($conn, $_POST['fecha_nam']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE id = '$id' && num_social = '$num_social' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'usuario existente!';

   }else{

      if($pass != $cpass){
         $error[] = 'contraseña no coincide!';
      }else{
         $insert = "INSERT INTO user_form(id, nombre, apellidos, num_social, telefono, email, fecha_nam, password, user_type) VALUES('$id','$nombre','$apellidos','$num_social','$telefono', '$email', '$fecha_nam','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:consultar_user.php');
      }
   }

};

?>

<!-------------------- HTML ------------------------->
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registrar Empleado</title>

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
         <form class="registro" action="" method="post">
            <h3>Registrar Empleado</h3>
            <?php
            if(isset($error)){
               foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
               };
            };
            ?>
            <input type="text" name="id" required placeholder="ID Empleado">
            <input type="text" name="nombre" required placeholder="Nombre">
            <input type="text" name="apellidos" required placeholder="Apellidos">
            <input type="text" name="num_social" required placeholder="Numero social">
            <input type="tel" name="telefono" required placeholder="Telefono">
            <input type="email" name="email" requierd placeholder="Correo electronico">
            <input type="date" name="fecha_nam" min="1922-01-01" max="2003-12-31">
            <input type="password" name="password" required placeholder="Contraseña">
            <input type="password" name="cpassword" required placeholder="Confimrar contraseña">
            <select name="user_type">
               <option value="empleado">Empleado</option>
               <option value="administrador">Administrador</option>
            </select>
            <input type="submit" name="submit" value="Registrar" class="form-btn">
         </form>
      </div>
   </div>
   <script src="../js/main.js"></script>
</body>
</html>