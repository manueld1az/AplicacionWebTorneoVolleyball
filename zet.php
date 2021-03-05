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
            <h3>zet</h3>
            <form action="#" method="POST">
                Cod_Set: <input type="number" name="Cod_Set"> <br>
                Cod_Encuentro: <input type="number" name="Cod_Encuentro"> <br>
                Ptos_Equipo1: <input type="number" name="Ptos_Equipo1"> <br>
                Ptos_Equipo2: <input type="number" name="Ptos_Equipo2"> <br>
               
                <input type="submit" name="Ingresar" value="Ingresar">
            </form>
    </body>
</html>

<?php

    if(isset($_POST["Ingresar"])){
        $cod_equipo=$_POST["Cod_Equipo"];
        $cod_encuentro=$_POST["Cod_Encuentro"];
        $ptos_equipo1=$_POST["Ptos_Equipo1"];
        $ptos_equipo2=$_POST["Ptos_Equipo2"];
        
    
    $sql = "INSERT INTO equipo (Cod_Equipo, Cod_Encuentro, Ptos_Equipo1, Ptos_Equipo2) 
    VALUES( $cod_equipo,'$cod_encuentro','$ptos_equipo1',$ptos_equipo2)";

    $resultado=mysqli_query($con,$sql) ;
    
        if( !$sql){
            echo"Error en el query database";
        }
    }
    
        

    echo "Se ingresaron los datos correctamente";

?>

<a href="planillastorneovoleibol.html">Regresar al menu</a>