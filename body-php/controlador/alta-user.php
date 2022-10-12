<?php
if(isset($_POST["Registrar"])){

    require("bd.php");
    //recoleccion de datos
    $nombre = $_POST["nombre"];
    $pwd = $_POST["pwd"];
    //guardar foto de perfil
    $f_perfil=$_FILES["f_perfil"]["name"];
    $ruta=$_FILES["f_perfil"]["tmp_name"];
    $destino="../../body-admin/assets/img/".$f_perfil;
    copy($ruta,$destino);

    $email = $_POST["email"];
    $fechaN = $_POST ["fechaN"];
    $telefono = $_POST ["telefono"];
    $ciudad = $_POST ["ciudad"];
    $estado = $_POST ["estado"];
    $Cpostal = $_POST ["Cpostal"];
    $Direccion =  $_POST ["Direccion"];
    $tipo = $_POST["tipo"];

    $adduser= "INSERT INTO user(nombre,pwd,f_perfil,email,fechaN,telefono,ciudad,estado,Cpostal,Direccion,tipo)
    VALUES ('$nombre',md5('$pwd'),'$f_perfil','$email','$fechaN','$telefono','$ciudad','$estado','$Cpostal','$Direccion','$tipo')"; //insertamos a la bd*/

    if(mysqli_query($conexion, $adduser)){

    $mensaje=" Cliente agregada correctamente ";
    Header("Location: ../../login.php?mensaje2=".$mensaje."");
    //echo "hola 1";

    }
    
    $conexion->close();  //cerramos mysql 

}   else 
    {
        header("Location: ../../register.php");
        //echo "hola 2";
    }
//fin de verificacion de boton


?>
