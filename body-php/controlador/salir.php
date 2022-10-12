<?php   
session_start(); //para asegurarse de que está utilizando la misma sesión
session_destroy(); //destruimos la sesión
//echo "hola esto es una prueba";
header("location: ../../login.php"); // para redirigirnos a login
exit();
?>