<?php
    include("../../../conexion/conexionServer.php");
    $codigoEquipo=$_POST["codigoEquipo"];
    $nombreColegio = $_POST["Nombre_Colegio"];
    $nombreEquipo = $_POST["Nombre_Equipo"];

    $sql = "UPDATE equipos 
    SET Nombre_Colegio='$nombreColegio', Nombre_Equipo='$nombreEquipo'
    WHERE Cod_Equipo='$codigoEquipo'";

$actualizar = mysqli_query($conexion, $sql);

if ($actualizar) {
  header("location: listaEquipos.php");
} else {
  echo "Error al Ingresar datos ";
}

mysqli_close($conexion); 
?>