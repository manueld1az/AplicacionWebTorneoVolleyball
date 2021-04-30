<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Link de boostrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <!-- Link de font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <title>Fase de grupos</title>
    <link rel="stylesheet" href="../../nuevoTorneo/listados/listas.css" />
</head>

<body>
    <header class="container">
        <div class="row">
            <div class="col-auto">
                <a href="menuRonda1.html">
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
            <h3 class="tittleMain">Encuentros Fase de Grupos</h3>
        </div>
        <?php include("../../conexion/conexionServer.php"); ?>
        <div class="row">
            <?php
            $sql = "SELECT Nombre_Equipo FROM equipos ORDER BY posicionSorteada";
            $consulta = mysqli_query($conexion, $sql);
            $equipo = [];

            while ($equipos = mysqli_fetch_array($consulta)) {
                $equipo[] = $equipos["Nombre_Equipo"];
            }

            $sql = "SELECT Fecha FROM encuentro ORDER BY Cod_Encuentro";
            $consulta = mysqli_query($conexion, $sql);
            $fecha = [];

            while ($fechas = mysqli_fetch_array($consulta)) {
                $fecha[] = $fechas["Fecha"];
            }

            $equipo1 = [];
            $equipo2 = [];

            for ($i = 0; $i < 8; $i++) {
                $nombreGrupos = ["A", "B", "C", "D", "E", "F", "G", "H"];
            ?>
                <div class="col-xs-12">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <td class="columnaCabecera">
                                    <p>
                                        <b>
                                            <center>Fechas</center>
                                        </b>
                                    </p>
                                </td>
                                <td class="columnaCabecera"></td>
                                <td class="columnaCabecera">
                                    <p>
                                        <b>
                                            <center>Grupo <?php echo $nombreGrupos[$i]; ?>
                                            </center>
                                        </b>
                                    </p>
                                </td>
                                <td class="columnaCabecera"></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($j = 0; $j < 6; $j++) {
                            ?>
                                <tr>
                                    <td>
                                        <center>
                                            <?PHP
                                            if ($i == 0) {
                                                echo $fecha[$j];
                                            } else if ($i == 1) {
                                                echo $fecha[$j + 6];
                                            } else if ($i == 2) {
                                                echo $fecha[$j + 12];
                                            } else if ($i == 3) {
                                                echo $fecha[$j + 18];
                                            } else if ($i == 4) {
                                                echo $fecha[$j + 24];
                                            } else if ($i == 5) {
                                                echo $fecha[$j + 30];
                                            } else if ($i == 6) {
                                                echo $fecha[$j + 36];
                                            } else if ($i == 7) {
                                                echo $fecha[$j + 42];
                                            }
                                            ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php

                                            /*  Esta variable se encarga de aumentar
                                                la posicion del array equipo para 
                                                hacer el salto de equipos entre tablas.*/
                                            $aumentoPosicion = 4;

                                            if ($i == 0) {
                                                if ($j == 0) {
                                                    echo $equipo[$j];
                                                    array_push($equipo1, $equipo[$j]);
                                                } else if ($j == 1) {
                                                    echo $equipo[$j + 1];
                                                    array_push($equipo1, $equipo[$j + 1]);
                                                } else if ($j == 2) {
                                                    echo $equipo[$j - 1];
                                                    array_push($equipo1, $equipo[$j - 1]);
                                                } else if ($j == 3) {
                                                    echo $equipo[$j];
                                                    array_push($equipo1, $equipo[$j]);
                                                } else if ($j == 4) {
                                                    echo $equipo[$j - 4];
                                                    array_push($equipo1, $equipo[$j - 4]);
                                                } else if ($j == 5) {
                                                    echo $equipo[$j - 4];
                                                    array_push($equipo1, $equipo[$j - 4]);
                                                }
                                            } else if ($i == 1) {
                                                if ($j == 0) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 1) {
                                                    echo $equipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + 1 + $aumentoPosicion]);
                                                } else if ($j == 2) {
                                                    echo $equipo[$j - 1 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 1 + $aumentoPosicion]);
                                                } else if ($j == 3) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 4) {
                                                    echo $equipo[$j - 4 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                                } else if ($j == 5) {
                                                    echo $equipo[$j - 4 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                                }
                                            } else if ($i == 2) {
                                                $aumentoPosicion = 8;
                                                if ($j == 0) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 1) {
                                                    echo $equipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + 1 + $aumentoPosicion]);
                                                } else if ($j == 2) {
                                                    echo $equipo[$j - 1 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 1 + $aumentoPosicion]);
                                                } else if ($j == 3) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 4) {
                                                    echo $equipo[$j - 4 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                                } else if ($j == 5) {
                                                    echo $equipo[$j - 4 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                                }
                                            } else if ($i == 3) {
                                                $aumentoPosicion = 12;
                                                if ($j == 0) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 1) {
                                                    echo $equipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + 1 + $aumentoPosicion]);
                                                } else if ($j == 2) {
                                                    echo $equipo[$j - 1 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 1 + $aumentoPosicion]);
                                                } else if ($j == 3) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 4) {
                                                    echo $equipo[$j - 4 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                                } else if ($j == 5) {
                                                    echo $equipo[$j - 4 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                                }
                                            } else if ($i == 4) {
                                                $aumentoPosicion = 16;
                                                if ($j == 0) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 1) {
                                                    echo $equipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + 1 + $aumentoPosicion]);
                                                } else if ($j == 2) {
                                                    echo $equipo[$j - 1 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 1 + $aumentoPosicion]);
                                                } else if ($j == 3) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 4) {
                                                    echo $equipo[$j - 4 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                                } else if ($j == 5) {
                                                    echo $equipo[$j - 4 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                                }
                                            } else if ($i == 5) {
                                                $aumentoPosicion = 20;
                                                if ($j == 0) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 1) {
                                                    echo $equipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + 1 + $aumentoPosicion]);
                                                } else if ($j == 2) {
                                                    echo $equipo[$j - 1 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 1 + $aumentoPosicion]);
                                                } else if ($j == 3) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 4) {
                                                    echo $equipo[$j - 4 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                                } else if ($j == 5) {
                                                    echo $equipo[$j - 4 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                                }
                                            } else if ($i == 6) {
                                                $aumentoPosicion = 24;
                                                if ($j == 0) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 1) {
                                                    echo $equipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + 1 + $aumentoPosicion]);
                                                } else if ($j == 2) {
                                                    echo $equipo[$j - 1 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 1 + $aumentoPosicion]);
                                                } else if ($j == 3) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 4) {
                                                    echo $equipo[$j - 4 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                                } else if ($j == 5) {
                                                    echo $equipo[$j - 4 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                                }
                                            } else if ($i == 7) {
                                                $aumentoPosicion = 28;
                                                if ($j == 0) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 1) {
                                                    echo $equipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + 1 + $aumentoPosicion]);
                                                } else if ($j == 2) {
                                                    echo $equipo[$j - 1 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 1 + $aumentoPosicion]);
                                                } else if ($j == 3) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 4) {
                                                    echo $equipo[$j - 4 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                                } else if ($j == 5) {
                                                    echo $equipo[$j - 4 + $aumentoPosicion];
                                                    array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                                }
                                            }
                                            ?>
                                        </center>
                                    </td>
                                    <td>
                                        <center>VS</center>
                                    </td>
                                    <td>
                                        <center>
                                            <?php
                                            if ($i == 0) {
                                                if ($j == 0) {
                                                    echo $equipo[$j + 1];
                                                    array_push($equipo2, $equipo[$j + 1]);
                                                } else if ($j == 1) {
                                                    echo $equipo[$j + 2];
                                                    array_push($equipo2, $equipo[$j + 2]);
                                                } else if ($j == 2) {
                                                    echo $equipo[$j];
                                                    array_push($equipo2, $equipo[$j]);
                                                } else if ($j == 3) {
                                                    echo $equipo[$j - 3];
                                                    array_push($equipo2, $equipo[$j - 3]);
                                                } else if ($j == 4) {
                                                    echo $equipo[$j - 2];
                                                    array_push($equipo2, $equipo[$j - 2]);
                                                } else if ($j == 5) {
                                                    echo $equipo[$j - 2];
                                                    array_push($equipo2, $equipo[$j - 2]);
                                                }
                                            } else if ($i == 1) {
                                                if ($j == 0) {
                                                    echo $equipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 1 + $aumentoPosicion]);
                                                } else if ($j == 1) {
                                                    echo $equipo[$j + 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 2 + $aumentoPosicion]);
                                                } else if ($j == 2) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 3) {
                                                    echo $equipo[$j - 3 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 3 + $aumentoPosicion]);
                                                } else if ($j == 4) {
                                                    echo $equipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                } else if ($j == 5) {
                                                    echo $equipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                }
                                            } else if ($i == 2) {
                                                if ($j == 0) {
                                                    echo $equipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 1 + $aumentoPosicion]);
                                                } else if ($j == 1) {
                                                    echo $equipo[$j + 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 2 + $aumentoPosicion]);
                                                } else if ($j == 2) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 3) {
                                                    echo $equipo[$j - 3 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 3 + $aumentoPosicion]);
                                                } else if ($j == 4) {
                                                    echo $equipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                } else if ($j == 5) {
                                                    echo $equipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                }
                                            } else if ($i == 3) {
                                                if ($j == 0) {
                                                    echo $equipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 1 + $aumentoPosicion]);
                                                } else if ($j == 1) {
                                                    echo $equipo[$j + 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 2 + $aumentoPosicion]);
                                                } else if ($j == 2) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 3) {
                                                    echo $equipo[$j - 3 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 3 + $aumentoPosicion]);
                                                } else if ($j == 4) {
                                                    echo $equipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                } else if ($j == 5) {
                                                    echo $equipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                }
                                            } else if ($i == 4) {
                                                if ($j == 0) {
                                                    echo $equipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 1 + $aumentoPosicion]);
                                                } else if ($j == 1) {
                                                    echo $equipo[$j + 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 2 + $aumentoPosicion]);
                                                } else if ($j == 2) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 3) {
                                                    echo $equipo[$j - 3 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 3 + $aumentoPosicion]);
                                                } else if ($j == 4) {
                                                    echo $equipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                } else if ($j == 5) {
                                                    echo $equipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                }
                                            } else if ($i == 5) {
                                                if ($j == 0) {
                                                    echo $equipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 1 + $aumentoPosicion]);
                                                } else if ($j == 1) {
                                                    echo $equipo[$j + 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 2 + $aumentoPosicion]);
                                                } else if ($j == 2) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 3) {
                                                    echo $equipo[$j - 3 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 3 + $aumentoPosicion]);
                                                } else if ($j == 4) {
                                                    echo $equipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                } else if ($j == 5) {
                                                    echo $equipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                }
                                            } else if ($i == 6) {
                                                if ($j == 0) {
                                                    echo $equipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 1 + $aumentoPosicion]);
                                                } else if ($j == 1) {
                                                    echo $equipo[$j + 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 2 + $aumentoPosicion]);
                                                } else if ($j == 2) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 3) {
                                                    echo $equipo[$j - 3 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 3 + $aumentoPosicion]);
                                                } else if ($j == 4) {
                                                    echo $equipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                } else if ($j == 5) {
                                                    echo $equipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                }
                                            } else if ($i == 7) {
                                                if ($j == 0) {
                                                    echo $equipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 1 + $aumentoPosicion]);
                                                } else if ($j == 1) {
                                                    echo $equipo[$j + 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 2 + $aumentoPosicion]);
                                                } else if ($j == 2) {
                                                    echo $equipo[$j + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + $aumentoPosicion]);
                                                } else if ($j == 3) {
                                                    echo $equipo[$j - 3 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 3 + $aumentoPosicion]);
                                                } else if ($j == 4) {
                                                    echo $equipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                } else if ($j == 5) {
                                                    echo $equipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                }
                                            }
                                            ?>
                                        </center>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            }
            ?>
    </main>

    <?PHP

    //  Se obtiene el codigo del ultimo encuentro

    $sql = "SELECT MAX(Cod_Encuentro) as mayorCodigoEncuentro FROM encuentro";
    $consulta = mysqli_query($conexion, $sql);
    $mayorCodigoEncuentro = mysqli_fetch_array($consulta);
    $codigoUltimoEncuentro = $mayorCodigoEncuentro["mayorCodigoEncuentro"] + 1;

    //  Se verifica que no haya ningun encuentro creado

    if ($codigoUltimoEncuentro != 1) {
        //  ya se han creado los encuentros y guardado en la base de datos
    } else {

        //                  Se guardan los datos de cada encuentro en la base de datos.

        //  Se obtienen los jueces de la DB

        $sql = "SELECT idJuez FROM jueces";
        $consulta = mysqli_query($conexion, $sql);
        $juez = [];

        while ($jueces = mysqli_fetch_array($consulta)) {
            $juez[] = $jueces["idJuez"];
        }

        $sql = "SELECT COUNT(idJuez) AS cantidadJueces FROM jueces";
        $consulta = mysqli_query($conexion, $sql);
        $jueces = mysqli_fetch_array($consulta);
        $cantidadJueces = $jueces["cantidadJueces"];

        for ($e = 0; $e < 48; $e++) {
            if ($e == 0) {
                //  La primera vez del for no sumara por que ya viene con el valor = 1
            } else {
                $codigoUltimoEncuentro++;
            }

            //  Se crea un numero aleatorio para el sorteo que dira cuales juces estaran en cada partido

            $numAleatorio1 = -1;
            $numAleatorio2 = -2;
            $numAleatorio3 = -3;
            $numAleatorio = -4;
            $f = 0;
            $limite = 3;
            do {
                $numAleatorio = rand(0, $cantidadJueces - 1);
                if ($f == 0 && $numAleatorio != $numAleatorio1 && $numAleatorio != $numAleatorio2 && $numAleatorio != $numAleatorio3) {
                    $numAleatorio1 = $numAleatorio;
                    $f++;
                } else if ($f == 1 && $numAleatorio != $numAleatorio1 && $numAleatorio != $numAleatorio2 && $numAleatorio != $numAleatorio3) {
                    $numAleatorio2 = $numAleatorio;
                    $f++;
                } else if ($f == 2 && $numAleatorio != $numAleatorio1 && $numAleatorio != $numAleatorio2 && $numAleatorio != $numAleatorio3) {
                    $numAleatorio3 = $numAleatorio;
                    $f++;
                }
            } while ($f < $limite);

            //  Se guarda la informacion del nuevo encuentro

            $sql = "INSERT INTO encuentro ( Cod_Encuentro , Num_ronda , Cod_Equipo1 , Cod_Equipo2 , Num_Cancha , Id_Juezuno , Id_Juezdos , Id_Jueztres )
            VALUES ( " . $codigoUltimoEncuentro . ", 1, 
            " . $equipo1[$e] . ",  
            " . $equipo2[$e] . ", 
            1,
            " . $juez[$numAleatorio1] . ",
            " . $juez[$numAleatorio2] . ",
            " . $juez[$numAleatorio3] . " )";
            $consulta = mysqli_query($conexion, $sql);
        }
    }
    ?>


    <!-- Scripts de boostrap-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <!--Scripts cdn de font awesome-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw==" crossorigin="anonymous"></script>
</body>

</html>