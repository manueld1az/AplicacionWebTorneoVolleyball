<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Link de boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <!-- Link de font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <title>Tabla de Estadisticas</title>
    <link rel="stylesheet" href="estadisticas.css" />
</head>

<body>
    <header class="container">
        <div class="row">
            <div class="col-auto">
                <a href="../ronda1/menuRonda1.html">
                    <h1><i class="fas fa-arrow-alt-circle-left"></i></h1>
                </a>
            </div>
            <div class="col-auto me-auto">
                <a href="../../../../index.html">
                    <h1><i class="fas fa-volleyball-ball"></i> SGTV</h1>
                </a>
            </div>
        </div>
    </header>
    <ul class="nav justify-content-center" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link btn button BN1" id="equipos-tab" data-toggle="tab" href="#posicionEquipos" role="tab"
                aria-controls="contenidoEquipos" aria-selected="true">Equipos</a>
        </li>
        <li class="nav-item">
            <!--   SE RELLENAN LOS CONTADORES DE TARJETAS CON EL ARRAY DEL LOCAL STORAGE AL CAMBIAR DE PAGINA -->
            <a class="nav-link btn button" id="jugadoras-tab" data-toggle="tab" href="#posicionJugadoras" role="tab"
                aria-controls="posicionJugadoras" aria-selected="true">Jugadoras</a>
        </li>
    </ul>
    <main class="tab-content container" id="myTabContent">
    <section class="tab-pane fade show active" id="posicionEquipos" role="tabpanel" aria-labelledby="equipos-tab">
        <div class="container">
            <center>
                <h3 class="tittleMain">
                Tabla de Posiciones Equipos
                </h3> 
            </center>
        </div>
        <center><i class="fas fa-users avatar"></i><br /></center>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td class="columnaCabecera">
                            <p>
                                <b>
                                    <center>Equipo</center>
                                </b>
                            </p>
                        </td>
                        <td class="columnaCabecera">
                            <p>
                                <b>
                                    <center>Puntaje</center>
                                </b>
                            </p>
                        </td>
                        
                        
                    </tr>
                </thead>
                <?php
                include("../../conexion/conexionServer.php");
                $sql = "SELECT Nombre_Equipo, puntosPorPartido FROM equipos ORDER BY puntosPorPartido DESC LIMIT 10";
                $consulta = mysqli_query($conexion, $sql);
                while ($mostrar = mysqli_fetch_assoc($consulta)) {
                ?>
                    <tbody>
                        <tr>
                            <td>
                                <center><?php echo $mostrar['Nombre_Equipo'] ?></center>
                            </td>
                            <td>
                                <center><?php echo $mostrar['puntosPorPartido'] ?></center>
                            </td>
                            
                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </section>
    <!-- SECCION DE JUGADORAS -->
    <section class="tab-pane fade" id="posicionJugadoras" role="tabpanel" aria-labelledby="jugadoras-tab">
    <div class="container">
            <center>
                <h3 class="tittleMain">
                Tabla de Posiciones Jugadoras
                </h3> 
            </center>
        </div>
        <center><i class="fas fa-users avatar"></i><br /></center>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td class="columnaCabecera">
                            <p>
                                <b>
                                    <center>Jugadora</center>
                                </b>
                            </p>
                        </td>
                        <td class="columnaCabecera">
                            <p>
                                <b>
                                    <center>Puntaje</center>
                                </b>
                            </p>
                        </td>
                        
                        
                    </tr>
                </thead>
                <?php
                include("../../conexion/conexionServer.php");
                $sql = "SELECT Nombre, Puntos_Anotados FROM jugadoras ORDER BY Puntos_Anotados DESC LIMIT 10";
                $consulta = mysqli_query($conexion, $sql);
                while ($mostrar = mysqli_fetch_assoc($consulta)) {
                ?>
                    <tbody>
                        <tr>
                            <td>
                                <center><?php echo $mostrar['Nombre'] ?></center>
                            </td>
                            <td>
                                <center><?php echo $mostrar['Puntos_Anotados'] ?></center>
                            </td>
                            
                        </tr>
                    </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </section>
    </main>
    <!-- Scripts de boostrap-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <!--Scripts cdn de font awesome-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw==" crossorigin="anonymous"></script>
</body>

</html>