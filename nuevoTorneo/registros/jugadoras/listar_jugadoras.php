<?php

    //coneccion base de datos MySQL con PHP
    
    //Datos de conección de la base de datos
    $usuario = "3500652_torneovoleibol";
    $password = "programacion2021";
    $servidor = "fdb22.awardspace.net";
    $basedatos = "3500652_torneovoleibol";

    //Creacion de conección a base de datos con mysql_connect()
    $conexionj = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de Datos");
    
    //seleccion de la base  de datos a utilizar
    $dbj = mysqli_select_db( $conexionj, $basedatos ) or die ( "Lo siento!! No se pudo conectar a la base de datos");

    //establecer y realizar consultas guardamos en variable.
    $consultaj = "SELECT * FROM jugadora";
    $resultadoj = mysqli_query($conexionj, $consultaj) or die("Algo no funciono en la consulta a la base de datos");

    //Mostrar el resultado de los registros de la base de datos
    //Encabezado de la tabla
    echo "<table border= '1'>";
    echo "<tr>";
    echo "<th>ID. JUGADORA</th>";
    echo "<th>NOMBRE</th>";
    echo "<th>EDAD</th>";
    echo "<th>DIRECCION</th>";
    echo "<th>TELEFONO</th>";
    echo "<th>PTOS. ANOTADOS</th>";
    echo "<th>AMONESTACIONES</th>";
    echo "<th>COD. EQUIPO</th>";
    echo "</tr>";

    //Bucle while que recorre cada registro y muestra cada campo en la tabla.
    while ($columnaj = mysqli_fetch_array($resultadoj))
    {
        echo "<tr>";
        echo "<td>" . $columnaj['Id_Jugadora'] . "</td><td>" . $columnaj['Nombre'] . "</td>
        <td>" . $columnaj['Edad'] . "</td><td>" . $columnaj['Direccion'] . "</td>
        <td>" . $columnaj['Telefono'] . "</td><td>" . $columnaj['Puntos_Anotados'] . "</td>
        <td>" . $columnaj['Amonestaciones'] . "</td><td>" . $columnaj['Cod_equipo'] . "</td>";
        echo "</tr>";
    }

    echo "</table>"; //fin de la tabla.

    //Cerrar conexiones base de datos.
    mysqli_close($conexionj);
    ?>
    <br><br>
    <a href="jugadoras.php">Regresar a Registrar Jugadoras</a><br><br>
    <a href="index.html">Inicio</a>

