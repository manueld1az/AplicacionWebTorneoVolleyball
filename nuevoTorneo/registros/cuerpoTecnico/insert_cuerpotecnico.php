<?php
if (isset($_POST["submit"])) {
    include("../AplicacionWebTorneoVolleyball/ignore/conexionServer.php");
    $sql = "INSERT INTO cuerpotecnico(id_Cuerpotecnico, Nombre, Cargo, Edad, Direccion, Telefono, 
        Amonestaciones, Cod_equipo) VALUES ('" . $_POST["Id_Jugadora"] . "', '" . $_POST["Nombre"] . "', 
        '" . $_POST["Edad"] . "', '" . $_POST["Direccion"] . "', '" . $_POST["Telefono"] . "', '" . $_POST["Amonestaciones"] . "', 
        '" . $_POST["Cod_equipo"] . "')";

    if (mysqli_query($conexion, $sql)) {
        echo "Nuevo registro guardado con exito";
    } else {
        echo "Error: " . $sql . "" . mysqli_query($conexion);
    }
    $conexion->close();
}
?>
<br>
<br>
<a href="cuerpotecnico.php">Regresar a registros de Cuerpo Técnico</a><br><br>
<a href="index.html">Inicio</a>