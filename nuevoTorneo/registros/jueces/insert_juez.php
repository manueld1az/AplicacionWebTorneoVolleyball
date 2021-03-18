<?php
if (isset($_POST["submit"])) {
    include("../AplicacionWebTorneoVolleyball/ignore/conexionServer.php");
    $sql = "INSERT INTO juez(Id_Juez, Nombre, Telefono, Direccion) 
        VALUES ('" . $_POST["Id_Juez"] . "', '" . $_POST["Nombre"] . "', '" . $_POST["Telefono"] . "', 
        '" . $_POST["Direccion"] . "')";

    if (mysqli_query($conexion, $sql)) {
        echo "Nuevo registro guardado con exito";
    } else {
        echo "Error: " . $sql . "" . mysqli_query($conexion);
    }
    $conjz->close();
}
?>
<br>
<br>
<a href="juez.php">Regresar a registros de Jueces</a><br><br>
<a href="index.html">Inicio</a>