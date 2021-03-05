<?php

    //coneccion base de datos MySQL con PHP
    
    //Datos de conección de la base de datos
    $usuario = "3500652_torneovoleibol";
    $password = "programacion2021";
    $servidor = "fdb22.awardspace.net";
    $basedatos = "3500652_torneovoleibol";

    //Creacion de conección a base de datos con mysql_connect()
    $conexionjz = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de Datos");
    
    //seleccion de la base  de datos a utilizar
    $dbjz = mysqli_select_db( $conexionjz, $basedatos ) or die ( "Lo siento!! No se pudo conectar a la base de datos");

    //establecer y realizar consultas guardamos en variable.
    $consultajz = "SELECT * FROM zet";
    $resultadojz = mysqli_query($conexionjz, $consultajz) or die("Algo no funciono en la consulta a la base de datos");

    //Mostrar el resultado de los registros de la base de datos
    //Encabezado de la tabla
    echo "<table border= '1'>";
    echo "<tr>";
    echo "<th>ID. JUEZ</th>";
    echo "<th>NOMBRE</th>";
    echo "<th>TELÉFONO</th>";
    echo "<th>DIRECCIÓN</th>";
    echo "</tr>";

    //Bucle while que recorre cada registro y muestra cada campo en la tabla.
    while ($columnajz = mysqli_fetch_array($resultadojz))
    {
        echo "<tr>";
        echo "<td>" . $columnajz['Id_Juez'] . "</td><td>" . $columnajz['Nombre'] . "</td>
        <td>" . $columnajz['Telefono'] . "</td><td>" . $columnajz['Direccion'] . "</td>";
        echo "</tr>";
    }

    echo "</table>"; //fin de la tabla.

    //Cerrar conexiones base de datos.
    mysqli_close($conexionjz);
    ?>
    <br><br>
    <a href="juez.php">Regresar a Registrar Jueces</a><br><br>
    <a href="index.html">Inicio</a>

