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
            <h3>Encuentro</h3>
            <form action="#" method="POST">
                Cod_Encuentro: <input type="number" name="Cod_Encuentro"> <br>
                Num_ronda: <input type="number" name="Num_ronda"> <br>
                Fecha: <input type="date" name="Fecha"> <br>
                Codigo equipo1: <input type="number" name="Cod_Equipo1"> <br>
                Puntos equipo1: <input type="number" name="Ptos_Equipo1"> <br>
                Codigo equipo2: <input type="number" name="Cod_Equipo2"> <br>
                Puntos equipo2: <input type="number" name="Ptos_equipo2"> <br>
                Num_Cancha: <input type="text" name="Num_Cancha"> <br>
                Id_Juez1:<input type="number" name="id_Juez1"> <br>
                Id_Juez2:<input type="number" name="Id_Juez2"> <br>
                Id_Juez3:<input type="number" name="Id_Juez3"> <br>
                <input type="submit" name="Ingresar" value="Ingresar">
            </form>
    </body>
</html>

<?php

    if(isset($_POST["Ingresar"])){
        $codencuentro=$_POST["Cud_Encuentro"];
        $numronda=$_POST["Num_ronda"];
        $fecha=$_POST["Fecha"];
        $codequipo1=$_POST["Cod_Equipo1"];
        $ptosequipo1=$_POST["Ptos_Equipo1"];
        $codequipo2=$_POST["Cod_Equipo2"];
        $ptosequipo2=$_POST["Ptos_Equipo2"];
        $numcancha=$_POST["Num_Cancha"];
        $idjuez1=$_POST["Id_Juez1"];
        $idjuez2=$_POST["Id_Juez2"];
        $idjuez3=$_POST["Id_Juez3"];
    
    $sql = "INSERT INTO encuentro (Cud_Encuentro, Num_ronda, Fecha, Cod_Equipo1, Ptos_Equipo1, Cod_Equipo2, Ptos_Equipo2, Num_Cancha, Id_Juez1, Id_Juez2, Id_Juez3) 
    VALUES( $codencuentro,$numronda,'$fecha',$codequipo1,$ptosequipo1,$codequipo2,$ptosequipo2,'$numcancha',$idjuez1,$idjuez2,$idjuez3)";

    $resultado=mysqli_query($con,$sql) ;
    
        if( !$sql){
            echo"Error en el query database";
        }
    }
    
        

    echo "Se ingresaron los datos correctamente";

?>

<a href="planillastorneovoleibol.html">Regresar al menu</a>