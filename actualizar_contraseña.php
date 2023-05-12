<?php

@include '../config.php';

$id = $_POST['id']; 
$pass = md5($_POST['password']);
$cpass = md5($_POST['cpassword']);


$query = " UPDATE user_form SET password='$pass', cpassword='$cpass'; WHERE id='$id'";
$conn -> query($query);

if($resultado){
    header("Location:login_form.php?message=success_password");
}

?>