<?php
    session_start();
    
    include ("../../conexion/conexionServer.php");
    /* $Usuario= $_POST["usuario"]; */
    $Email= $_POST["correo"];
    $Password= $_POST["contraseña"];
    $_SESSION['correo']= $Email;

    $sql = "SELECT usuario, correo, contraseña FROM usuarios 
    WHERE correo = '$Email' /* AND contraseña = '$Password' */";
    $resultado=mysqli_query($conexion, $sql);
    $filas=mysqli_fetch_assoc($resultado);
    if(empty($filas['correo'])){
        echo "Error: Su usuario y clave no coinciden";
        header("location: login.php");
    }else{
        $PassEnc = $filas['contraseña'];
        if(password_verify($Password, $PassEnc)){
            header("location: ../../index.php");
        }else{
            echo "Error: Contraseña incorrecta";
            header("location: login.php");
        }
    }
    /* $filas=mysqli_num_rows($resultado);

    if ($filas) {
        header("location: ../../index.php");

    } else {
        echo "Error: Su usuario y clave no coinciden ";
        header("location: login.php");
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion); */
?>