<?php
if (isset($_POST["submit"])) {
    include("../AplicacionWebTorneoVolleyball/ignore/conexionServer.php");
    $sql = "INSERT INTO jugadora(Id_Jugadora, Nombre, Edad, Direccion, Telefono, 
        Puntos_Anotados, Amonestaciones, Cod_equipo) VALUES ('" . $_POST["Id_Jugadora"] . "', 
        '" . $_POST["Nombre"] . "', '" . $_POST["Edad"] . "', '" . $_POST["Direccion"] . "',
        '" . $_POST["Telefono"] . "','" . $_POST["Puntos_Anotados"] . "','" . $_POST["Amonestaciones"] . "', '" . $_POST["Cod_equipo"] . "')";

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
<a href="jugadoras.php">Regresar a registros de jugadoras</a><br><br>
<a href="index.html">Inicio</a>