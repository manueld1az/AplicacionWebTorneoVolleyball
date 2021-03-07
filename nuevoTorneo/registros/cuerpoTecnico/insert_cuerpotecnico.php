<?php
    if (isset($_POST["submit"])){
        $user="3500652_torneovoleibol";
        $pass="programacion2021";
        $server="fdb22.awardspace.net";
        $db="3500652_torneovoleibol";

        //crearte connection
        $conct=mysqli_connect($server,$user,$pass,$db);

        //Check connection
        if ($conct->connet_error){
            die("Error en la conexion servidor: " . $conct->connect_error);
        }
        $sqlct = "INSERT INTO cuerpotecnico(id_Cuerpotecnico, Nombre, Cargo, Edad, Direccion, Telefono, 
        Amonestaciones, Cod_equipo) VALUES ('".$_POST["Id_Jugadora"]."', '".$_POST["Nombre"]."', 
        '".$_POST["Edad"]."', '".$_POST["Direccion"]."', '".$_POST["Telefono"]."', '".$_POST["Amonestaciones"]."', 
        '".$_POST["Cod_equipo"]."')";

        if (mysqli_query($conct, $sqlct)) {
            echo "Nuevo registro guardado con exito";
        }else {
            echo "Error: " . $sqlct . "" . mysqli_query($conct);
        }
        $conct->close();
    }
?>
<br>
<br>
<a href="cuerpotecnico.php">Regresar a registros de Cuerpo Técnico</a><br><br>
<a href="index.html">Inicio</a>