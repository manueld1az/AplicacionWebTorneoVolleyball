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
        <title>Equipos</title>
    </head>
    <body>
    <div class="d-grid gap-2 col-7 mx-auto"><button type="button" class="btn btn-primary btn-lg">Ingresos Equipos</button></div><br><br><br>
        <div id= "wrapper">
            <form action="insert_equipos.php" method= "POST">
                <label for="">Cod. Equipo: </label>
                <input type="number" name="Cod_Equipo" id="Cod_Equipo" size="4" require> <br>
                <label for="">Nombre Colegio: </label>
                <input type="text" name="Nombre_Colegio" id ="Nombre_Colegio" size="30" require><br>
                <label for="">Nombre Equipo: </label>
                <input type="text" name="Nombre_Equipo" id ="Nombre_Equipo" size="20" require><br>
                <label for="">Pts. Equipo: </label>
                <input type="number" name="Ptos_Equipo" id="Ptos_Equipo" size="4" require> <br> 
                <br><br>
                <input type="submit" value="Ingresar" name="submit"><br><br>
                <a href="listar_equipos.php">Verificar Registros de Equipos</a><br><br>
                <a href="index.html">Inicio</a>
            </form>
        </div>

    </body>
</html>
