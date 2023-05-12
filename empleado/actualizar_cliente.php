<?php

@include '../config.php';

session_start();

if(!isset($_SESSION['empleado_name'])){
   header('location:../login_form.php');
}

$id = $_POST['id'];
$nombre =  $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$fecha_nam = $_POST['fecha_nam'];
$curp = $_POST['curp'];
$domicilio = $_POST['domicilio'];
$codigo_postal = $_POST['codigo_postal'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$paquete_type = $_POST['paquete_type'];

$select = " UPDATE cliente_form SET nombre='$nombre', apellidos='$apellidos', fecha_nam='$fecha_nam', curp='$curp', domicilio='$domicilio', codigo_postal='$codigo_postal', telefono='$telefono', email='$email', paquete_type='$paquete_type' WHERE id='$id'";
$resultado = mysqli_query($conn, $select);

if($resultado){
    header("Location:consultar_cliente.php");
}

?>