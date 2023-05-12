<?php

@include '../config.php';



?>

<!-------------------- HTML ------------------------->
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Recuperación de contraseña</title>

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

      <form action="recovery.php" method="post">
         <h3>Recuperación de contraseña</h3>
         <br>
         <h4>Ingresa tu correo electronico</h4>
         <br>
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };
         ?>
         <input type="email" name="email" required placeholder="Correo electronico">
         <input type="submit" name="submit" value="Enviar Correo" class="form-btn">
         <p>Regresar a la <a href="login_form.php">Validación de usuario</a></p>

         <?php
         if(isset($_GET['message'])){
            
         ?>

            <div class="alert alert-primary" role="alert">
            <?php 
            switch($_GET['message']){
               case'ok':
                  echo 'Por favor, revisa tu correo electronico';
                  break;

               default:
                  echo 'Algo salió mal, intenta de nuevo';
                  break;
            }
            ?>
            </div>

         <?php 
         }
         ?>

      </form>

   </div>

</body>
</html>