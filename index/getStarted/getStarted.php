<?php
    include ("../../conexion/conexionServer.php");

    $Usuario= $_POST["usuario"];
    $Nombre= $_POST["nombre"];
    $Tipo= $_POST["tipo"];
    $Email= $_POST["correo"];
    $Password= $_POST["contraseña"];
    $Celular= $_POST["celular"];

    $sql = "INSERT INTO usuarios ( usuario, nombre, tipo, correo, contraseña, celular ) 
            VALUES ( '$Usuario', '$Nombre', '$Tipo', '$Email', '$Password', '$Celular')";

    $registrar=mysqli_query($conexion, $sql);

    if ( $registrar ) {
        header("location: ../../index.html");
    } else {
        echo "Error: ";
    }
    $conexion->close();
?>