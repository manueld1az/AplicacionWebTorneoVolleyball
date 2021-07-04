<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Link de boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <!-- Link de font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
    <title>Lista de Encuentros</title>
    <link rel="stylesheet" href="../../nuevoTorneo/listados/listas.css" />
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
                <a href="../../index.html">
                    <h1><i class="fas fa-volleyball-ball"></i> SGTV</h1>
                </a>
            </div>
        </div>
    </header>
    <main class="container main">
        <div class="container">
            <?php
            //  SE OBTIENE LA FECHA ACTUAL DEL SISTEMA PARA HACER LA CONSULTA A LA BASE DE DATOS
                //  Y ASI OBTENER SOLO LOS ENCUENTROS DEL DIA.
                date_default_timezone_set("America/Bogota");
                $fechaDelServidor=date('Y-m-j');
            ?>
            <h3 class="tittleMain">Lista de Encuentros del dia de hoy<?php echo "<center>".date('j-m-Y')."</center>";?>
            </h3>
        </div>
        <h4 class="my-5">
            <center>Elija un encuentro dando un click en cualquier lugar de las filas para entrar a sumar puntos y
                amonestaciones</center>
        </h4>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <td class="columnaCabecera">
                            <p>
                                <b>
                                    <center>Hora Encuentro</center>
                                </b>
                            </p>
                        </td>
                        <td class="columnaCabecera">
                            <p>
                                <b>
                                    <center>Equipo Uno</center>
                                </b>
                            </p>
                        </td>
                        <td class="columnaCabecera">
                            <p>
                                <b>
                                    <center>Equipo Dos</center>
                                </b>
                            </p>
                        </td>
                        <td class="columnaCabecera">
                            <p>
                                <b>
                                    <center>Opciones</center>
                                </b>
                            </p>
                        </td>
                    </tr>
                </thead>
                <?php
                include("../../conexion/conexionServer.php");
                $sql = "SELECT Cod_Encuentro, Hora, Cod_Equipo1, Cod_Equipo2 
                        FROM encuentro
                        WHERE Fecha = '$fechaDelServidor' ";
                $consulta = mysqli_query($conexion, $sql);
                while ($mostrar = mysqli_fetch_assoc($consulta)) {
                    ?>
                <tbody>
                    <tr>
                        <td>
                            <a
                                href="interfazSet.php?Cod_Encuentro=<?php echo $mostrar['Cod_Encuentro'] ?>">
                                <center><?php echo $mostrar['Hora'] ?>
                                </center>
                            </a>
                        </td>
                        <td>
                            <a
                                href="interfazSet.php?Cod_Encuentro=<?php echo $mostrar['Cod_Encuentro'] ?>">
                                <center><?php echo $mostrar['Cod_Equipo1'] ?>
                                </center>
                            </a>
                        </td>
                        <td>
                            <a
                                href="interfazSet.php?Cod_Encuentro=<?php echo $mostrar['Cod_Encuentro'] ?>">
                                <center><?php echo $mostrar['Cod_Equipo2'] ?>
                                </center>
                            </a>
                        </td>
                        <td>
                            <center>
                                <a href="../ronda1/encuentros/encuentro/actualizarEncuentros.php?Cod_Encuentro=<?php echo $mostrar['Cod_Encuentro'] ?>"
                                    title="Editar" aria-hidden="true">
                                    <i class="fas fa-edit botonEditar"></i>
                                </a>
                            </center>
                        </td>
                    </tr>
                </tbody>
                <?php
                }
                ?>
            </table>
        </div>
    </main>
    <!-- Scripts de boostrap-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
    <!--Scripts cdn de font awesome-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"
        integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw=="
        crossorigin="anonymous"></script>
</body>

</html>