<?php
    if (isset($_POST["submit"])){
        $user="3500652_torneovoleibol";
        $pass="programacion2021";
        $server="fdb22.awardspace.net";
        $db="3500652_torneovoleibol";

        //crearte connection
        $cone=mysqli_connect($server,$user,$pass,$db);

        //Check connection
        if ($cone->connet_error){
            die("Error en la conexion servidor: " . $cone->connect_error);
        }
        $sqle = "INSERT INTO equipo(Cod_Equipo, Nombre_Colegio, Nombre_Equipo, Ptos_Equipo) 
        VALUES ('".$_POST["Cod_Equipo"]."', '".$_POST["Nombre_Colegio"]."', 
        '".$_POST["Nombre_Equipo"]."', '".$_POST["Ptos_Equipo"]."')";

        if (mysqli_query($cone, $sqle)) {
            echo "Nuevo registro guardado con exito";
        }else {
            echo "Error: " . $sqle . "" . mysqli_query($cone);
        }
        $cone->close();
    }
?>
<br>
<br>
<a href="equipo.php">Regresar a registros de Equipos</a><br><br>
<a href="index.html">Inicio</a>