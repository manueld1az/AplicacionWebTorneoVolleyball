<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Link de boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <!-- Link de font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <title>Error Equipos</title>
    <link rel="stylesheet" href="esquema.css" />
</head>

<body>
    <header class="container">
        <div class="row">
            <div class="col-auto">
                <a href="menuRoda1.html">
                    <h1><i class="fas fa-arrow-alt-circle-left"></i></h1>
                </a>
            </div>
            <div class="col-auto me-auto">
                <a href="../../index.html">
                    <h1><i class="fas fa-volleyball-ball"></i> SGTV</h1>
                </a>
            </div>
        </div>
    </header>
    <?php

    include("../conexion/conexionServer.php");

    $sql = "SELECT COUNT(Cod_Equipo) AS equiposInscritos FROM equipos";
    $consulta = mysqli_query($conexion, $sql);
    $equiposInscritos = mysqli_fetch_assoc($consulta);
    $equiposInscritos = $equiposInscritos['equiposInscritos'];

    if ($equiposInscritos == 32) {
        header("location: ronda1/menuRonda1.html");
    } else if ($equiposInscritos == 16) {
        header("location: ronda2/menuRonda2.html");
    } else if ($equiposInscritos == 8) {
        header("location: ronda3.php");
    } else if ($equiposInscritos == 4) {
        header("location: ronda4.php");
    } else if ($equiposInscritos == 2) {
        header("location: ronda5.php");
    } else {
    ?>
        <h5>Error: La cantidad de equipos no es compatible al modelo de este tipo de torneo.</h5><br>
        <h5>La cantidad de equipos actualmente es: <?php echo $equiposInscritos; ?></h5>
        <?php
        if ($equiposInscritos > 32) {
        ?>
            <h5>Esa cantidad de equipos es superior a la maxima permitida que es de 32 equipos</h5>
        <?php
        } else if ($equiposInscritos < 2) {
        ?>
            <h5>La cantidad de equipos actual no es suficiente para iniciar el torneo</h5>
        <?php
        } else {
        ?>
            <h5>La cantidad de equipos actual no es compatible con las que manejaa este torneo</h5>
    <?php
        }
    }
    ?>
    <h5>La cantidad de equipos que puede manejar esta aplicacion actualmente es de: 32-16-8-4-2 Equipos</h5>
    <h3>Verifique la lista de los equipos inscritos en los <a href="../nuevoTorneo/listados/equipos/listaEquipos.php">registros <= Click aqui</a>
    </h3>

    <!-- Scripts de boostrap-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <!--Scripts cdn de font awesome-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw==" crossorigin="anonymous"></script>
</body>

</html>