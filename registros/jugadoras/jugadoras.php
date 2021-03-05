<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
        content= "user-scalable=0,initial-scale=1.0,
        maximum-scale=1.0, maximum-scale=1.0">
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
        crossorigin="anonymous"
        />
        <link rel="stylesheet" href="estilos.css" />
        <title>Jugadora</title>
    </head>
    <body>
    <div class="d-grid gap-2 col-7 mx-auto"><button type="button" class="btn btn-primary btn-lg">Ingresos Jugadoras</button></div><br><br><br>
        <div id= "wrapper">
            <form action="insert_jugadoras.php" method= "POST">
                <label for="">Id_Jugadora: </label>
                <input type="number" name="Id_Jugadora" id="Id_Jugadora" size="15" require> <br>
                <label for="">Nombre: </label>
                <input type="text" name="Nombre" id ="Nombre" size="25" require><br>
                <label for="">Edad: </label>
                <input type="number" name="Edad" id="Edad" size="2" require> <br>
                <label for="">Dirección: </label>
                <input type="text" name="Direccion" id="Direccion" size="30" require> <br>
                <label for="">Telefono: </label>
                <input type="texto" name="Telefono" id="Telefono" size="15" require> <br>
                <label for="">Puntos Anotados: </label>
                <input type="number" name="Puntos_Anotados" id="Puntos_Anotados" size="4" require> <br>
                <label for="">Amonestaciones:</label>
                <input type="text" name="Amonestaciones" id ="Amonestaciones" size="15"><br>
                <label for="">Codigo Equipo: </label>
                <input type="number" name="Cod_equipo" id="Cod_equipo" size="4" require> <br> 
                <br><br>
                <input type="submit" value="Ingresar" name="submit"><br><br>
                <a href="listar_jugadoras.php">Verificar Registros Jugadoras</a><br><br>
                <a href="index.html">Inicio</a>
            </form>
        </div>

    </body>
</html>
