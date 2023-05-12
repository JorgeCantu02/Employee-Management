<?php

@include '../config.php';

session_start();

if(!isset($_SESSION['empleado_name'])){
   header('location:../login_form.php');
}


// -------------Form Registrar Cliente------------------

if(isset($_POST['submit'])){

   $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
   $apellidos = mysqli_real_escape_string($conn, $_POST['apellidos']);
   $fecha_nam = mysqli_real_escape_string($conn, $_POST['fecha_nam']);
   $curp = mysqli_real_escape_string($conn, $_POST['curp']);
   $domicilio = mysqli_real_escape_string($conn, $_POST['domicilio']);
   $codigo_postal = mysqli_real_escape_string($conn, $_POST['codigo_postal']);
   $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $paquete_type = $_POST['paquete_type'];

   $select = " SELECT * FROM cliente_form WHERE curp = '$curp' && email = '$email' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'cliente existente!';

   }else{

        $insert = "INSERT INTO cliente_form(nombre, apellidos, fecha_nam, curp, domicilio, codigo_postal, telefono, email, paquete_type) VALUES('$nombre','$apellidos','$fecha_nam','$curp','$domicilio','$codigo_postal','$telefono','$email','$paquete_type')";
        mysqli_query($conn, $insert);
        header('location:consultar_cliente.php');

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
   <title>Registrar cliente</title>

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

        <div class="form-container">
            <form action="" method="post">
                <h3>Registrar Cliente</h3>
                <?php
                if(isset($error)){
                    foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                    };
                };
                ?>
                <input type="text" name="nombre" required placeholder="Nombre">
                <input type="text" name="apellidos" required placeholder="Apellidos">
                <input type="date" name="fecha_nam" min="1922-01-01" max="2003-12-31">
                <input type="text" name="curp" required placeholder="CURP">
                <input type="text" name="domicilio" required placeholder="Domicilio">
                <input type="text" name="codigo_postal" required placeholder="Codigo Postal">
                <input type="tel" name="telefono" name="numero" onkeypress="return solonum(event)" onpaste="return false" required placeholder="Telefono">
                <input type="email" name="email" required placeholder="Correo Electronico">
                <select name="paquete_type">
                    <option value="80 canales HD">Paquete 80 canales HD</option>
                    <option value="500 canales HD">Paquete 500 canales HD</option>
                </select>
                <input type="submit" name="submit" value="Registrar" class="form-btn">
            </form>
        </div>
   </div>

   <script src="../js/main.js"></script>

</body>
</html>