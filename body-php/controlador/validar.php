<?php
//verifica que los datos sean enviados por un botn llamado "enviar"
//echo  "la variable es".$_POST["Ingresar"];
//die;
if(isset($_POST["Ingresar"])) {

    require("bd.php");
    //recoleccion de datos
        $loginNombre = $_POST["nombre"];
        $loginPassword = $_POST["pwd"];
        //proivicion y sustitucion de caracteres especiales
        $contra = $loginPassword;
        $texto = preg_replace('([^A-Za-z0-9_/.-@])', '', $contra);  
        //echo $texto." ".$loginNombre;
        //cifrado de contraseña(en la base de dato tambien tiene que estar cifrado)
        $contraCam=md5($texto);
        //creamos y ejecutamos la consulta
        $consulta = "SELECT * FROM user WHERE nombre='$loginNombre' AND pwd='$contraCam'";
        if($resultado = $conexion->query($consulta)) {

            //guardamos los datos extraidos de la bd en una variable 
            while($row = $resultado->fetch_array()) {
                $userok = $row["nombre"];
                $passok = $row["pwd"];
                $id_user= $row["id_user"];
                $tipo = $row["tipo"];
            }
            $resultado->close();
        }
        $conexion->close();
        //comparamos que los datos enviados y los datos guardados sean los mismos
        if(isset($loginNombre) && isset($contraCam)) {
            if($loginNombre == $userok && $contraCam == $passok) {
                session_start();
                $_SESSION["logueado"] = TRUE;//si todo se cumple se crear varuables globales
                $_SESSION["id_user"]=$id_user;
                $_SESSION["usr"]=$userok;
                $_SESSION["tipo"]=$tipo;
              header("Location: ../../body-admin/index.php");
            }
            //redireccionamos encaso de k los datos no sean iguales
            else {
                $error="Usuario o Contraseña inconrrectos";
               Header("Location: ../../login.php?error=".$error."");
               //echo "hola entramos a retornar login";
            }
        }
        //redireccionamos encaso de k los datos no fuesen enviado por el boton "enviar"
    } else {
        header("Location: ../login.php");
        //echo "hola usuario bien y bonito";
    }
?>