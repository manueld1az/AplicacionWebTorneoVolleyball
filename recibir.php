<?php

    $con= mysqli_connect ('fdb22.awardspace.net', '3500652', 'programacion2021', '3500652_torneovoleibol')
or die('Error en la conexion servidor');
    mysqli_set_charset($con, "UTF8");
    $sql= "INSERT INTO jugadora VALUES( '".$_POST["Id_Jugadora"]."',
'".$_POST["Nombre"]."','".$_POST["Edad"]."','".$_POST["Direccion"]."',
'".$_POST["Telefono"]."', '".$_POST["Puntos_Anotados"]."',
'".$_POST["Amonestaciones"]."', '".$_POST["Cod_equipo"]."')";
    $resultado= mysqli_query($con,$sql) or die ('Error en el query database');
    mysqli_close($con);

echo 'Se ingreso correctamente el Id: '.$_POST["Id_Jugadora"];
echo 'Se ingreso correctamente el Nombre: '.$_POST["Nombre"];
echo 'Se ingreso correctamente la Edad: '.$_POST["Edad"];
echo 'Se ingreso correctamente la Dirección: '.$_POST["Direccion"];
echo 'Se ingreso correctamente el Teléfono: '.$_POST["Telefono"];
echo 'Se ingreso correctamente los Puntos: '.$_POST["Puntos_Anotados"];
echo 'Se ingreso correctamente las Amonestaciones: '.$_POST["Amonestaciones"];
echo 'Se ingreso correctamente el Codigo del Equipo: '.$_POST["Cod_equipo"];

?>