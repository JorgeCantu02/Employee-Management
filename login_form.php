<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $id = mysqli_real_escape_string($conn, $_POST['id']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user_form WHERE id = '$id' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['user_type'] == 'administrador'){

         $_SESSION['administrador_name'] = $row['nombre'];
         header('location:administrador/admin_page.php');

      }elseif($row['user_type'] == 'empleado'){

         $_SESSION['empleado_name'] = $row['nombre'];
         header('location:empleado/user_page.php');

      }
     
   }else{
      $error[] = 'ID o contraseña incorrecto!';
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
   <title>Validacion de usuario</title>

   <!--- Enlace relativo --->
   <link rel="stylesheet" href="http://localhost/proyectoING/test/css/style.css">
   <!--Enlace absoluto-->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet">
</head>
<body>

   <header>    
      <nav class="navegadores">
         <img src="imagenes/logo.png" alt="logo" width="120" height="100">  
         <ul class="header-content">
            <li class="texto">
               <h1>TV X CABLE</h1>
               <h3>TELECOMUNICACIONES</h3>
            </li>
         </ul>
      </nav>
   </header>

   <div class="form-container">

      <form action="" method="post">
         <h3>Validación de usuario</h3>
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };
         ?>
         <input type="text" name="id" required placeholder="ID Empleado">
         <input type="password" name="password" required placeholder="Contraseña">
         <input type="submit" name="submit" value="Ingresar" class="form-btn">
         <p>¿No recuerdas tu contraseña? <br><a href="recuperar_datos.php">Recuperar contraseña</a></p>

      </form>

   </div>

</body>
</html>