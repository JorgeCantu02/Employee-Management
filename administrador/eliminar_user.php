<?php

@include '../config.php';

session_start();

if(!isset($_SESSION['administrador_name'])){
   header('location:../login_form.php');
}

$id = $_GET['id'];

$sql=" DELETE FROM user_form WHERE id = '$id' ";
$resultado = mysqli_query($conn, $sql);

if($resultado){
    header("Location:consultar_user.php");
}

?>