<?php
    if (isset($_POST["submit"])){
        $user="3500652_torneovoleibol";
        $pass="programacion2021";
        $server="fdb22.awardspace.net";
        $db="3500652_torneovoleibol";

        //crearte connection
        $conj=mysqli_connect($server,$user,$pass,$db);

        //Check connection
        if ($conj->connet_error){
            die("Error en la conexion servidor: " . $conj->connect_error);
        }
        $sqlj = "INSERT INTO jugadora(Id_Jugadora, Nombre, Edad, Direccion, Telefono, 
        Puntos_Anotados, Amonestaciones, Cod_equipo) VALUES ('".$_POST["Id_Jugadora"]."', 
        '".$_POST["Nombre"]."', '".$_POST["Edad"]."', '".$_POST["Direccion"]."',
        '".$_POST["Telefono"]."','".$_POST["Puntos_Anotados"]."','".$_POST["Amonestaciones"]."', '".$_POST["Cod_equipo"]."')";

        if (mysqli_query($conj, $sqlj)) {
            echo "Nuevo registro guardado con exito";
        }else {
            echo "Error: " . $sqlj . "" . mysqli_query($conj);
        }
        $conj->close();
    }
?>
<br>
<br>
<a href="jugadoras.php">Regresar a registros de jugadoras</a><br><br>
<a href="index.html">Inicio</a>