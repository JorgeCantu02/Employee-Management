<?php

@include '../config.php';

session_start();

if(!isset($_SESSION['administrador_name'])){
   header('location:../login_form.php');
}

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$num_social = $_POST['num_social'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$fecha_nam = $_POST['fecha_nam'];
// $pass = md5($_POST['password']);
// $cpass = md5($_POST['cpassword']);
$user_type = $_POST['user_type'];

$select = " UPDATE user_form SET nombre='$nombre', apellidos='$apellidos', num_social='$num_social', telefono='$telefono', email='$email', fecha_nam='$fecha_nam', user_type='$user_type' WHERE id='$id'";
$resultado = mysqli_query($conn, $select);

if($resultado){
    header("Location:consultar_user.php");
}

?>