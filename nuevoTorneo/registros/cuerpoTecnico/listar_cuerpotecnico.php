<?php

    //coneccion base de datos MySQL con PHP
    
    //Datos de conección de la base de datos
    $usuario = "3500652_torneovoleibol";
    $password = "programacion2021";
    $servidor = "fdb22.awardspace.net";
    $basedatos = "3500652_torneovoleibol";

    //Creacion de conección a base de datos con mysql_connect()
    $conexionct = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de Datos");
    
    //seleccion de la base  de datos a utilizar
    $dbct = mysqli_select_db( $conexionct, $basedatos ) or die ( "Lo siento!! No se pudo conectar a la base de datos");

    //establecer y realizar consultas guardamos en variable.
    $consultact = "SELECT * FROM cuerpotecnico";
    $resultadoct = mysqli_query($conexionct, $consultact) or die("Algo no funciono en la consulta a la base de datos");

    //Mostrar el resultado de los registros de la base de datos
    //Encabezado de la tabla
    echo "<table border= '1'>";
    echo "<tr>";
    echo "<th>ID. CUERPO TÉCNICO</th>";
    echo "<th>NOMBRE</th>";
    echo "<th>CARGO</th>";
    echo "<th>EDAD</th>";
    echo "<th>DIRECCION</th>";
    echo "<th>TELEFONO</th>";
    echo "<th>AMONESTACIONES</th>";
    echo "<th>COD. EQUIPO</th>";
    echo "</tr>";

    //Bucle while que recorre cada registro y muestra cada campo en la tabla.
    while ($columnact = mysqli_fetch_array($resultadoct))
    {
        echo "<tr>";
        echo "<td>" . $columnact['Id_Jugadora'] . "</td><td>" . $columnact['Nombre'] . "</td>
        <td>" . $columnact['Cargo'] . "</td><td>" . $columnact['Edad'] . "</td>
        <td>" . $columnact['Direccion'] . "</td><td>" . $columnact['Telefono'] . "</td>
        <td>" . $columnact['Amonestaciones'] . "</td><td>" . $columnact['Cod_equipo'] . "</td>";
        echo "</tr>";
    }

    echo "</table>"; //fin de la tabla.

    //Cerrar conexiones base de datos.
    mysqli_close($conexionct);
    ?>
    <br><br>
    <a href="cuerpotecnico.php">Regresar a Registrar Cuerpo Técnico</a><br><br>
    <a href="index.html">Inicio</a>

