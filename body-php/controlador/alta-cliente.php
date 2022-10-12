<?php
if(isset($_POST["enviar"])) {
    require("bd.php");
    //recoleccion de datos y variables
        
    $nombreC = $_POST["nombreC"];
    $direC = $_POST["direC"];
    $teleC = $_POST["teleC"];
    $email = $_POST["email"];
    $curp = $_POST["curp"];
    $rfc = $_POST["rfc"];
    $fechaC = $_POST["fechaC"];
    $lugarNC = $_POST["lugarNC"];
    $beneC = $_POST["beneC"];
    //datos del beneficiario
    $nombreB = $_POST["nombreB"];
    $direcB = $_POST["direcB"];
    $teleB = $_POST["teleB"];
    $emailB = $_POST["emailB"];
    $curpB = $_POST["curpB"];
    $rfcB = $_POST["rfcB"];
    $fechaNB = $_POST["fechaNB"];
    $lugarNB = $_POST["lugarNB"];
    $banco = $_POST["banco"];
    $claveI = $_POST["claveI"];
    $fechaF = $_POST["fechaF"];

    
    //echo $nombrec." ".$direC." ".$teleC." ".$email. " ".$curp." ".$rfc." ".$fechaC." ".$lugarNC." ".$beneC." ".$nombreB." ".$direcB." ".$teleB." ".$emailB." ".$curpB." ".$rfcB." ".$fechaNB." ".$lugarNB." ".$banco." ".$claveI." ".$fechaF." ";

    
    $consulta= "INSERT INTO cliente (nombreC,direC,teleC,email,curp,rfc,fechaC,lugarNC,beneC,nombreB,direcB,teleB,emailB,curpB,rfcB,fechaNB,lugarNB,banco,claveI,fechaF) 
    VALUES ('$nombreC','$direC','$teleC','$email','$curp','$rfc','$fechaC','$lugarNC','$beneC','$nombreB','$direcB','$teleB','$emailB','$curpB','$rfcB','$fechaNB','$lugarNB','$banco','$claveI','$fechaF')";//insercion a la base de datos
    //ejecusion de la consulta
    if(mysqli_query($conexion, $consulta)){
    $mensaje=" Cliente agregada correctamente ";
    Header("Location: ../../body-admin/list-client.php?mensaje2=".$mensaje."");
    }
    
    $conexion->close();  //cerramos mysql 

            
} else 
    {
        header("Location: ../../body-admin/form-basic.php");
    }
//fin de verificacion de boton
?>