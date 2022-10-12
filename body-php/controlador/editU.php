<?php
include("bd.php");

$id_user = $_POST['id_user'];
$nombre = $_POST['nombre'];

$f_perfil=$_FILES["f_perfil"]["name"];
$ruta=$_FILES["f_perfil"]["tmp_name"];
$destino="../../body-admin/assets/img/".$f_perfil;
copy($ruta,$destino);

$email = $_POST['email'];
$fechaN = $_POST['fechaN'];
$telefono = $_POST['telefono'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$Cpostal = $_POST['Cpostal'];
$Direccion = $_POST['Direccion'];


$consulta = "UPDATE user set nombre='$nombre',f_perfil='$f_perfil',email='$email',fechaN='$fechaN',telefono='$telefono',ciudad='$ciudad',estado='$estado',Cpostal='$Cpostal',Direccion='$Direccion'
WHERE id_user='$id_user'"; //inserccion a la bd

if(mysqli_query($conexion, $consulta)){
    $mensaje="Datos del usuarui modificado correctamente";
    //Header("Location ../../body-admin/list-client.php?mensaje=".$mensaje"");
    //echo "datos modificaos";
    Header("Location: ../../body-admin/profile.php?mensaje=".$mensaje."");
}

$conexion->close(); //cerramos la bd
?>