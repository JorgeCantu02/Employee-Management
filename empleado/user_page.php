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
   <title>Pagina de Empleado</title>

   <!--- Enlace relativo --->
   <link rel="stylesheet" href="http://localhost/proyectoING/test/css/style.css">
   <!--Enlace absoluto-->
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

      <div class="content1">
         <div class="content_text block" data-seccion="1">
            <div class="container">
               <div class="content">
                  <h3><span>Empleado</span></h3>
                  <h1>Bienvenido <span><?php echo $_SESSION['empleado_name'] ?></span></h1>
                  <img class="logo" src="../imagenes/logo.png" alt="logo">
               </div>
            </div>
         </div>
      </div>
   </div>
   
   <script src="../js/main.js"></script>

</body>
</html>