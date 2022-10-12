<?php
include("bd.php");

$id_cliente = $_POST['id_cliente'];
$nombreC = $_POST['nombreC'];
$direC = $_POST['direC'];
$teleC = $_POST['teleC'];
$email = $_POST['email'];
$curp = $_POST['curp'];
$rfc = $_POST['rfc'];
$fechaC = $_POST['fechaC'];
$lugarNC = $_POST['lugarNC'];
$beneC = $_POST['beneC'];
$direcB = $_POST['direcB'];
$teleB = $_POST['teleB'];
$emailB = $_POST['emailB'];
$curpB = $_POST['curpB'];
$rfcB = $_POST['rfcB'];
$fechaNB = $_POST['fechaNB'];
$lugarNB = $_POST['lugarNB'];
$banco = $_POST['banco'];
$claveI = $_POST['claveI'];
$fechaF = $_POST['fechaF'];


$consulta = "UPDATE cliente set nombreC='$nombreC',direC='$direC',teleC='$teleC',email='$email',curp='$curp',rfc='$rfc',fechaC='$fechaC',lugarNC='$lugarNC',beneC='$beneC',direcB='$direcB',teleB='$teleB',emailB='$emailB',curpB='$curpB',rfcB='$rfcB',fechaNB='$fechaNB',lugarNB='$lugarNB',banco='$banco',claveI='$claveI',fechaF='$fechaF'
WHERE id_cliente='$id_cliente'"; //inserccion a la bd

if(mysqli_query($conexion, $consulta)){
    $mensaje="Datos del cliente modificado correctamente";
    //Header("Location ../../body-admin/list-client.php?mensaje=".$mensaje"");
    //echo "datos modificaos";
    Header("Location: ../../body-admin/list-client.php?mensaje=".$mensaje."");
}

$conexion->close(); //cerramos la bd
?>