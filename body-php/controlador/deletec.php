<?php
    require("bd.php");
    $clien=$_GET["id_cliente"];

    $consulta = "DELETE FROM cliente WHERE id_cliente='$clien'";

    if(mysqli_query($conexion, $consulta)){
        $mensaje="Cliente eliminado";
        Header("Location: ../../body-admin/list-client.php?mensaje=".$mensaje."");
    }
    $conexion->close();  

?>