<?php
    if (isset($_POST["submit"])){
        $user="3500652_torneovoleibol";
        $pass="programacion2021";
        $server="fdb22.awardspace.net";
        $db="3500652_torneovoleibol";

        //crearte connection
        $conjz=mysqli_connect($server,$user,$pass,$db);

        //Check connection
        if ($conjz->connet_error){
            die("Error en la conexion servidor: " . $conjz->connect_error);
        }
        $sqljz = "INSERT INTO juez(Id_Juez, Nombre, Telefono, Direccion) 
        VALUES ('".$_POST["Id_Juez"]."', '".$_POST["Nombre"]."', '".$_POST["Telefono"]."', 
        '".$_POST["Direccion"]."')";

        if (mysqli_query($conjz, $sqljz)) {
            echo "Nuevo registro guardado con exito";
        }else {
            echo "Error: " . $sqljz . "" . mysqli_query($conjz);
        }
        $conjz->close();
    }
?>
<br>
<br>
<a href="juez.php">Regresar a registros de Jueces</a><br><br>
<a href="index.html">Inicio</a>