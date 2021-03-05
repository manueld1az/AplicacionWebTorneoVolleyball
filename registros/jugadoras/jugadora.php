<?php
     $user="3500652_torneovoleibol";
     $pass="programacion2021";
     $server="fdb22.awardspace.net";
     $db="3500652_torneovoleibol";
     
     $con=mysqli_connect($server,$user,$pass,$db);

    if (!$con){
        echo"Error en la conexion servidor";
    }
?>
     
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
        content= "user-scalable=0,initial-scale=1.0,
        maximum-scale=1.0, maximum-scale=1.0">
        <title>Torneo intercolegiado de voleibol
            femenino 2021</title>
            <link rel="stylesheet" href="estilost.css">
    </head>
    <body>
    <div class="contenedor">
            
            
            <form action="#" method="POST">
            <h3>Jugadora</h3>
                Id_Jugadora: <input type="number" name="Id_jugadora"> <br>
                Nombre: <input type="text" name="Nombre"> <br>
                Edad: <input type="number" name="Edad"> <br>
                Dirección: <input type="text" name="Direccion"> <br>
                Teléfono:  <input type="text" name="Telefono"> <br>
                Puntos Anotados: <input type="number" name="Puntos_Anotados"> <br>
                Amonestaciones: <input type="text" name="Amonestaciones"> <br>
                Codigo Equipo: <input type="number" name="Cod_equipo"> <br>
                <input type="submit" name="Ingresar" value="Ingresar">
            </form>
            <div class="container">
      <h1 class="tittle">Tabla Jugadoras</h1>
      <table class="table" border="1">
        <thead>
          <tr>
            <td>
              <h3>Id Jugadora</h3>
            </td>
            <td>
              <h3>Nombre</h3>
            </td>
            <td>
              <h3>Edad</h3>
            </td>
            <td>
              <h3>Direccion</h3>
            </td>
            <td>
              <h3>Telefono</h3>
            </td>
            <td>
              <h3>Puntos Anotados</h3>
            </td>
            <td>
              <h3>Amonestaciones</h3>
            </td>
            <td>
              <h3>Codigo Equipo</h3>
            </td>
          </tr>
        </thead>

        <?php


                $sql="SELECT * FROM jugadora";
                $consulta=mysqli_query($con,$sql);

                while($mostrar=mysqli_fetch_array($consulta)){
                    ?>
        <tbody>
          <tr>
            <td><?php echo $mostrar['Id_Jugadora']?></td>
            <td><?php echo $mostrar['Nombre']?></td>
            <td><?php echo $mostrar['Edad']?></td>
            <td><?php echo $mostrar['Direccion']?></td>
            <td><?php echo $mostrar['Telefono']?></td>
            <td><?php echo $mostrar['Puntos_Anotados']?></td>
            <td><?php echo $mostrar['Amonestaciones']?></td>
            <td><?php echo $mostrar['Cod_equipo']?></td>
          </tr>
        </tbody>
        <?php
            }
        ?>
       </table>
      </div>
      </div>
    </body>
</html>

<?php

    if(isset($_POST["Ingresar"])){
        $idJugadora=$_POST["Id_jugadora"];
        $nombre=$_POST["Nombre"];
        $edad=$_POST["Edad"];
        $direccion=$_POST["Direccion"];
        $telefono=$_POST["Telefono"];
        $puntosAnotados=$_POST["Puntos_Anotados"];
        $amonestaciones=$_POST["Amonestaciones"];
        $codigoEquipo=$_POST["Cod_equipo"];
    
    $sql = "INSERT INTO jugadora (Id_jugadora, Nombre, Edad, Direccion, Telefono, Puntos_Anotados, Amonestaciones, Cod_equipo) 
    VALUES( $idJugadora,'$nombre',$edad,'$direccion','$telefono',$puntosAnotados,'$amonestaciones',$codigoEquipo)";

    $resultado=mysqli_query($con,$sql) ;
    
        if( !$sql){
            echo"Error en el query database";
        }
    }
    
        

    echo "Se ingreso correctamente el Id: " .$idJugadora."<br>";


?>

<br><a href="planillastorneovoleibol.html">Regresar al menu</a>