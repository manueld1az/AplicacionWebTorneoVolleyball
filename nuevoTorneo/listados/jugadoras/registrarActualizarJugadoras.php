<?php
    include("../../../conexion/conexionServer.php");
    $NumeroRegistro=$_POST["NumeroRegistro"];
    $Id_Jugadora = $_POST["Id_Jugadora"];
    $Nombre = $_POST["Nombre"];
    $Telefono = $_POST["Telefono"];
    $Cod_equipo = $_POST["Cod_equipo"];

    $sql = "UPDATE jugadoras 
    SET Id_Jugadora='$Id_Jugadora', Nombre='$Nombre', 
        FechaNacimiento='".$_POST["FechaNacimiento"]."',
        Telefono='$Telefono', Cod_equipo='$Cod_equipo'
    WHERE NumeroRegistro='$NumeroRegistro'";

$actualizar = mysqli_query($conexion, $sql);

if ($actualizar) {
  header("location: listaJugadoras.php");
} else {
  echo "Error al Ingresar datos ";
}

mysqli_close($conexion); 
?>