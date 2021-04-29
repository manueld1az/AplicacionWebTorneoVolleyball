<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Link de boostrap-->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
            crossorigin="anonymous"/>
        <!-- Link de font awesome-->
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
            integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
            crossorigin="anonymous"/>
        <title>Modificar Puntos</title>
        <link rel="stylesheet" href="../../../../nuevoTorneo/listados/listas.css"/>
    </head>

    <body>
        <header class="container">
            <div class="row">
                <div class="col-auto me-auto">
                    <a href="../../../../index.html">
                        <h1><i class="fas fa-volleyball-ball"></i> SGTV</h1>
                    </a>
                </div>
            </div>
        </header>
        <main class="container main">
            <div class="container">
                <h3 class="tittleMain">Modificar Puntos</h3>
            </div>
            <center><i class="fas fa-users avatar"></i><br /></center>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <td class="columnaCabecera">
                                <p>
                                    <b>
                                        <center>Puntos</center>
                                    </b>
                                </p>
                            </td>
                            <td class="columnaCabecera">
                                <p>
                                    <b>
                                        <center>ID Jugadora</center>
                                    </b>
                                </p>
                            </td>
                            <td class="columnaCabecera">
                                <p>
                                    <b>
                                        <center>Codigo Equipo</center>
                                    </b>
                                </p>
                            </td>
                            <td class="columnaCabecera">
                                <p>
                                    <b>
                                        <center>Codigo Encuentro</center>
                                    </b>
                                </p>
                            </td>
                            <td class="columnaCabecera">
                                <p>
                                    <b>
                                        <center>Codigo Set</center>
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
                    include("../../../../conexion/conexionServer.php");
                    $NumregistroPuntos=$_GET["NumregistroPuntos"];
                    $sql = "SELECT * FROM puntaje where NumregistroPuntos='$NumregistroPuntos'";
                    $consulta = mysqli_query($conexion, $sql);
                    while ($mostrar = mysqli_fetch_assoc($consulta)) {
                    ?>
                    <tbody>
                        <form
                            class="row g-3 needs-validation"
                            novalidate
                            action="registrarActualizarPuntos.php"
                            method="POST">
                            <input
                                type="hidden"
                                name="NumregistroPuntos"
                                class="form-control"
                                id="validationCustom01"
                                min="0"
                                value="<?php echo $mostrar['NumregistroPuntos'] ?>"
                                required/>  
                            <tr>                    
                                <td>
                                    <center>
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="puntos"
                                            id="validationCustom01"
                                            min="0"
                                            value="<?php echo $mostrar['puntos'] ?>"
                                            required/>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <input
                                            type="number"
                                            name="idJugadora"
                                            class="form-control"
                                            id="validationCustom01"
                                            value="<?php echo $mostrar['idJugadora'] ?>"
                                            required/>
                                        <div class="valid-feedback">Looks good!</div>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <input
                                            type="number"
                                            name="codigoEquipo"
                                            class="form-control"
                                            id="validationCustom01"
                                            value="<?php echo $mostrar['codigoEquipo'] ?>"
                                            required/>
                                        <div class="valid-feedback">Looks good!</div>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <input
                                            type="number"
                                            name="codigoEncuentro"
                                            class="form-control"
                                            id="validationCustom01"
                                            value="<?php echo $mostrar['codigoEncuentro'] ?>"
                                            required/>
                                        <div class="valid-feedback">Looks good!</div>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <input
                                            type="number"
                                            class="form-control"
                                            name="CodSet"
                                            id="validationCustom01"
                                            min="0"
                                            value="<?php echo $mostrar['CodSet'] ?>"
                                            required/>
                                    </center>
                                </td>
                                <td>
                                    <center>
                                        <button
                                            type="submit"
                                            name="submit"
                                            title="Guardar"
                                            id="botonesLista"
                                            class="btn">
                                        <i class="far fa-check-square"></i>
                                        </button>
                                        <a
                                            href="listarPuntos.php"
                                            title="Cancelar"
                                            id="botonesLista">
                                            <i class="far fa-window-close"></i>
                                        </a>
                                    </center>
                                </td>
                            </tr>
                        </form>
                    </tbody>
                    <?php
                    
                    }
                    ?>
                </table>
            </div>
        </main>
        <!-- Scripts de boostrap-->
        <script
            src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
            crossorigin="anonymous"></script>
        <!--Scripts cdn de font awesome-->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"
            integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw=="
            crossorigin="anonymous"></script>
    </body>
</html>
