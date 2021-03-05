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
            <h3>Ronda</h3>
            <form action="#" method="POST">
                Num_Ronda: <input type="number" name="Num_Ronda"> <br>
                Grupos: <input type="text" name="Grupos"> <br>
                
                <input type="submit" name="Ingresar" value="Ingresar">
            </form>
    </body>
</html>

<?php

    if(isset($_POST["Ingresar"])){
        $num_ronda=$_POST["Num_Ronda"];
        $grupos=$_POST["Grupos"];
        
    
    $sql = "INSERT INTO ronda (Num_Ronda, Grupos) 
    VALUES( $num_ronda,'$grupos')";

    $resultado=mysqli_query($con,$sql) ;
    
        if( !$sql){
            echo"Error en el query database";
        }
    }
    
        

    echo "Se ingresaron correctamente los datos"; 

?>

<a href="planillastorneovoleibol.html">Regresar al menu</a>