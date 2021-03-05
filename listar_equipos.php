<?php

    //coneccion base de datos MySQL con PHP
    
    //Datos de conección de la base de datos
    $usuario = "3500652_torneovoleibol";
    $password = "programacion2021";
    $servidor = "fdb22.awardspace.net";
    $basedatos = "3500652_torneovoleibol";

    //Creacion de conección a base de datos con mysql_connect()
    $conexione = mysqli_connect( $servidor, $usuario, $password ) or die ("No se ha podido conectar al servidor de Base de Datos");
    
    //seleccion de la base  de datos a utilizar
    $dbe = mysqli_select_db( $conexione, $basedatos ) or die ( "Lo siento!! No se pudo conectar a la base de datos");

    //establecer y realizar consultas guardamos en variable.
    $consultae = "SELECT * FROM equipo";
    $resultadoe = mysqli_query($conexione, $consultae) or die("Algo no funciono en la consulta a la base de datos");

    //Mostrar el resultado de los registros de la base de datos
    //Encabezado de la tabla
    echo "<table border= '1'>";
    echo "<tr>";
    echo "<th>COD. EQUIPO</th>";
    echo "<th>NOMBRE DEL COLEGIO</th>";
    echo "<th>NOMBRE DEL EQUIPO</th>";
    echo "<th>PTOS. DEL EQUIPO</th>";
    echo "</tr>";

    //Bucle while que recorre cada registro y muestra cada campo en la tabla.
    while ($columnae = mysqli_fetch_array($resultadoe))
    {
        echo "<tr>";
        echo "<td>" . $columnae['Cod_Equipo'] . "</td><td>" . $columnae['Nombre_Colegio'] . "</td>
        <td>" . $columnae['Nombre_Equipo'] . "</td><td>" . $columnae['Ptos_Equipo'] . "</td>";
        echo "</tr>";
    }

    echo "</table>"; //fin de la tabla.

    //Cerrar conexiones base de datos.
    mysqli_close($conexione);
    ?>
    <br><br>
    <a href="equipo.php">Regresar a Registrar Equipos</a><br><br>
    <a href="index.html">Inicio</a>

