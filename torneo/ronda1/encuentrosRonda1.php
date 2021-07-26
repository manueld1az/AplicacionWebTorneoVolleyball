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
                <a href="../../index.php">
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
            $sql = "SELECT Cod_Equipo, Nombre_Equipo FROM equipos ORDER BY posicionSorteada";
            $consulta = mysqli_query($conexion, $sql);

            while ($equipos = mysqli_fetch_array($consulta)) {
                $equipo[] = $equipos["Cod_Equipo"];
                $nombreEquipo[] = $equipos["Nombre_Equipo"];
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
                $nombreGrupos = ["A", "B", "C", "D", "E", "F", "G", "H"]; ?>
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
                            <td class="columnaCabecera">
                                <p>
                                    <b>
                                        <center>Equipo Local</center>
                                    </b>
                                </p>
                            </td>
                            <td class="columnaCabecera">
                                <p>
                                    <b>
                                        <center>Grupo <?php echo $nombreGrupos[$i]; ?>
                                        </center>
                                    </b>
                                </p>
                            </td>
                            <td class="columnaCabecera">
                                <p>
                                    <b>
                                        <center>Equipo Visitante</center>
                                    </b>
                                </p>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for ($j = 0; $j < 6; $j++) {
                                ?>
                        <tr>
                            <td>
                                <center>
                                    <?php
                                            if ($i == 0) {
                                                echo $fecha[$j];
                                            } elseif ($i == 1) {
                                                echo $fecha[$j + 6];
                                            } elseif ($i == 2) {
                                                echo $fecha[$j + 12];
                                            } elseif ($i == 3) {
                                                echo $fecha[$j + 18];
                                            } elseif ($i == 4) {
                                                echo $fecha[$j + 24];
                                            } elseif ($i == 5) {
                                                echo $fecha[$j + 30];
                                            } elseif ($i == 6) {
                                                echo $fecha[$j + 36];
                                            } elseif ($i == 7) {
                                                echo $fecha[$j + 42];
                                            } ?>
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
                                        echo $nombreEquipo[$j];
                                        array_push($equipo1, $equipo[$j]);
                                    } elseif ($j == 1) {
                                        echo $nombreEquipo[$j + 1];
                                        array_push($equipo1, $equipo[$j + 1]);
                                    } elseif ($j == 2) {
                                        echo $nombreEquipo[$j - 1];
                                        array_push($equipo1, $equipo[$j - 1]);
                                    } elseif ($j == 3) {
                                        echo $nombreEquipo[$j];
                                        array_push($equipo1, $equipo[$j]);
                                    } elseif ($j == 4) {
                                        echo $nombreEquipo[$j - 4];
                                        array_push($equipo1, $equipo[$j - 4]);
                                    } elseif ($j == 5) {
                                        echo $nombreEquipo[$j - 4];
                                        array_push($equipo1, $equipo[$j - 4]);
                                    }
                                } elseif ($i == 1) {
                                    if ($j == 0) {
                                        echo $nombreEquipo[$j + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                    } elseif ($j == 1) {
                                        echo $nombreEquipo[$j + 1 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + 1 + $aumentoPosicion]);
                                    } elseif ($j == 2) {
                                        echo $nombreEquipo[$j - 1 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 1 + $aumentoPosicion]);
                                    } elseif ($j == 3) {
                                        echo $nombreEquipo[$j + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                    } elseif ($j == 4) {
                                        echo $nombreEquipo[$j - 4 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                    } elseif ($j == 5) {
                                        echo $nombreEquipo[$j - 4 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                    }
                                } elseif ($i == 2) {
                                    $aumentoPosicion = 8;
                                    if ($j == 0) {
                                        echo $nombreEquipo[$j + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                    } elseif ($j == 1) {
                                        echo $nombreEquipo[$j + 1 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + 1 + $aumentoPosicion]);
                                    } elseif ($j == 2) {
                                        echo $nombreEquipo[$j - 1 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 1 + $aumentoPosicion]);
                                    } elseif ($j == 3) {
                                        echo $nombreEquipo[$j + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                    } elseif ($j == 4) {
                                        echo $nombreEquipo[$j - 4 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                    } elseif ($j == 5) {
                                        echo $nombreEquipo[$j - 4 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                    }
                                } elseif ($i == 3) {
                                    $aumentoPosicion = 12;
                                    if ($j == 0) {
                                        echo $nombreEquipo[$j + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                    } elseif ($j == 1) {
                                        echo $nombreEquipo[$j + 1 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + 1 + $aumentoPosicion]);
                                    } elseif ($j == 2) {
                                        echo $nombreEquipo[$j - 1 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 1 + $aumentoPosicion]);
                                    } elseif ($j == 3) {
                                        echo $nombreEquipo[$j + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                    } elseif ($j == 4) {
                                        echo $nombreEquipo[$j - 4 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                    } elseif ($j == 5) {
                                        echo $nombreEquipo[$j - 4 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                    }
                                } elseif ($i == 4) {
                                    $aumentoPosicion = 16;
                                    if ($j == 0) {
                                        echo $nombreEquipo[$j + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                    } elseif ($j == 1) {
                                        echo $nombreEquipo[$j + 1 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + 1 + $aumentoPosicion]);
                                    } elseif ($j == 2) {
                                        echo $nombreEquipo[$j - 1 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 1 + $aumentoPosicion]);
                                    } elseif ($j == 3) {
                                        echo $nombreEquipo[$j + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                    } elseif ($j == 4) {
                                        echo $nombreEquipo[$j - 4 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                    } elseif ($j == 5) {
                                        echo $nombreEquipo[$j - 4 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                    }
                                } elseif ($i == 5) {
                                    $aumentoPosicion = 20;
                                    if ($j == 0) {
                                        echo $nombreEquipo[$j + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                    } elseif ($j == 1) {
                                        echo $nombreEquipo[$j + 1 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + 1 + $aumentoPosicion]);
                                    } elseif ($j == 2) {
                                        echo $nombreEquipo[$j - 1 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 1 + $aumentoPosicion]);
                                    } elseif ($j == 3) {
                                        echo $nombreEquipo[$j + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                    } elseif ($j == 4) {
                                        echo $nombreEquipo[$j - 4 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                    } elseif ($j == 5) {
                                        echo $nombreEquipo[$j - 4 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                    }
                                } elseif ($i == 6) {
                                    $aumentoPosicion = 24;
                                    if ($j == 0) {
                                        echo $nombreEquipo[$j + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                    } elseif ($j == 1) {
                                        echo $nombreEquipo[$j + 1 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + 1 + $aumentoPosicion]);
                                    } elseif ($j == 2) {
                                        echo $nombreEquipo[$j - 1 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 1 + $aumentoPosicion]);
                                    } elseif ($j == 3) {
                                        echo $nombreEquipo[$j + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                    } elseif ($j == 4) {
                                        echo $nombreEquipo[$j - 4 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                    } elseif ($j == 5) {
                                        echo $nombreEquipo[$j - 4 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                    }
                                } elseif ($i == 7) {
                                    $aumentoPosicion = 28;
                                    if ($j == 0) {
                                        echo $nombreEquipo[$j + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                    } elseif ($j == 1) {
                                        echo $nombreEquipo[$j + 1 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + 1 + $aumentoPosicion]);
                                    } elseif ($j == 2) {
                                        echo $nombreEquipo[$j - 1 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 1 + $aumentoPosicion]);
                                    } elseif ($j == 3) {
                                        echo $nombreEquipo[$j + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j + $aumentoPosicion]);
                                    } elseif ($j == 4) {
                                        echo $nombreEquipo[$j - 4 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                    } elseif ($j == 5) {
                                        echo $nombreEquipo[$j - 4 + $aumentoPosicion];
                                        array_push($equipo1, $equipo[$j - 4 + $aumentoPosicion]);
                                    }
                                } ?>
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
                                                    echo $nombreEquipo[$j + 1];
                                                    array_push($equipo2, $equipo[$j + 1]);
                                                } elseif ($j == 1) {
                                                    echo $nombreEquipo[$j + 2];
                                                    array_push($equipo2, $equipo[$j + 2]);
                                                } elseif ($j == 2) {
                                                    echo $nombreEquipo[$j];
                                                    array_push($equipo2, $equipo[$j]);
                                                } elseif ($j == 3) {
                                                    echo $nombreEquipo[$j - 3];
                                                    array_push($equipo2, $equipo[$j - 3]);
                                                } elseif ($j == 4) {
                                                    echo $nombreEquipo[$j - 2];
                                                    array_push($equipo2, $equipo[$j - 2]);
                                                } elseif ($j == 5) {
                                                    echo $nombreEquipo[$j - 2];
                                                    array_push($equipo2, $equipo[$j - 2]);
                                                }
                                            } elseif ($i == 1) {
                                                if ($j == 0) {
                                                    echo $nombreEquipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 1 + $aumentoPosicion]);
                                                } elseif ($j == 1) {
                                                    echo $nombreEquipo[$j + 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 2 + $aumentoPosicion]);
                                                } elseif ($j == 2) {
                                                    echo $nombreEquipo[$j + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + $aumentoPosicion]);
                                                } elseif ($j == 3) {
                                                    echo $nombreEquipo[$j - 3 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 3 + $aumentoPosicion]);
                                                } elseif ($j == 4) {
                                                    echo $nombreEquipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                } elseif ($j == 5) {
                                                    echo $nombreEquipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                }
                                            } elseif ($i == 2) {
                                                if ($j == 0) {
                                                    echo $nombreEquipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 1 + $aumentoPosicion]);
                                                } elseif ($j == 1) {
                                                    echo $nombreEquipo[$j + 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 2 + $aumentoPosicion]);
                                                } elseif ($j == 2) {
                                                    echo $nombreEquipo[$j + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + $aumentoPosicion]);
                                                } elseif ($j == 3) {
                                                    echo $nombreEquipo[$j - 3 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 3 + $aumentoPosicion]);
                                                } elseif ($j == 4) {
                                                    echo $nombreEquipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                } elseif ($j == 5) {
                                                    echo $nombreEquipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                }
                                            } elseif ($i == 3) {
                                                if ($j == 0) {
                                                    echo $nombreEquipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 1 + $aumentoPosicion]);
                                                } elseif ($j == 1) {
                                                    echo $nombreEquipo[$j + 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 2 + $aumentoPosicion]);
                                                } elseif ($j == 2) {
                                                    echo $nombreEquipo[$j + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + $aumentoPosicion]);
                                                } elseif ($j == 3) {
                                                    echo $nombreEquipo[$j - 3 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 3 + $aumentoPosicion]);
                                                } elseif ($j == 4) {
                                                    echo $nombreEquipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                } elseif ($j == 5) {
                                                    echo $nombreEquipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                }
                                            } elseif ($i == 4) {
                                                if ($j == 0) {
                                                    echo $nombreEquipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 1 + $aumentoPosicion]);
                                                } elseif ($j == 1) {
                                                    echo $nombreEquipo[$j + 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 2 + $aumentoPosicion]);
                                                } elseif ($j == 2) {
                                                    echo $nombreEquipo[$j + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + $aumentoPosicion]);
                                                } elseif ($j == 3) {
                                                    echo $nombreEquipo[$j - 3 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 3 + $aumentoPosicion]);
                                                } elseif ($j == 4) {
                                                    echo $nombreEquipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                } elseif ($j == 5) {
                                                    echo $nombreEquipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                }
                                            } elseif ($i == 5) {
                                                if ($j == 0) {
                                                    echo $nombreEquipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 1 + $aumentoPosicion]);
                                                } elseif ($j == 1) {
                                                    echo $nombreEquipo[$j + 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 2 + $aumentoPosicion]);
                                                } elseif ($j == 2) {
                                                    echo $nombreEquipo[$j + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + $aumentoPosicion]);
                                                } elseif ($j == 3) {
                                                    echo $nombreEquipo[$j - 3 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 3 + $aumentoPosicion]);
                                                } elseif ($j == 4) {
                                                    echo $nombreEquipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                } elseif ($j == 5) {
                                                    echo $nombreEquipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                }
                                            } elseif ($i == 6) {
                                                if ($j == 0) {
                                                    echo $nombreEquipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 1 + $aumentoPosicion]);
                                                } elseif ($j == 1) {
                                                    echo $nombreEquipo[$j + 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 2 + $aumentoPosicion]);
                                                } elseif ($j == 2) {
                                                    echo $nombreEquipo[$j + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + $aumentoPosicion]);
                                                } elseif ($j == 3) {
                                                    echo $nombreEquipo[$j - 3 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 3 + $aumentoPosicion]);
                                                } elseif ($j == 4) {
                                                    echo $nombreEquipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                } elseif ($j == 5) {
                                                    echo $nombreEquipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                }
                                            } elseif ($i == 7) {
                                                if ($j == 0) {
                                                    echo $nombreEquipo[$j + 1 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 1 + $aumentoPosicion]);
                                                } elseif ($j == 1) {
                                                    echo $nombreEquipo[$j + 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + 2 + $aumentoPosicion]);
                                                } elseif ($j == 2) {
                                                    echo $nombreEquipo[$j + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j + $aumentoPosicion]);
                                                } elseif ($j == 3) {
                                                    echo $nombreEquipo[$j - 3 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 3 + $aumentoPosicion]);
                                                } elseif ($j == 4) {
                                                    echo $nombreEquipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                } elseif ($j == 5) {
                                                    echo $nombreEquipo[$j - 2 + $aumentoPosicion];
                                                    array_push($equipo2, $equipo[$j - 2 + $aumentoPosicion]);
                                                }
                                            } ?>
                                </center>
                            </td>
                        </tr>
                        <?php
                            } ?>
                    </tbody>
                </table>
            </div>
            <?php
            }
            ?>
    </main>

    <?php


    for ($i=0; $i < 48 ; $i++) {
        $sql = "SELECT Nombre_Equipo FROM equipos WHERE Cod_Equipo = $equipo1[$i]";
        $consulta = mysqli_query($conexion, $sql);
        while ($equipos = mysqli_fetch_array($consulta)) {
            $nombresEquipo1[] = $equipos["Nombre_Equipo"];
        }
    }

    for ($i=0; $i < 48 ; $i++) {
        $sql = "SELECT Nombre_Equipo FROM equipos WHERE Cod_Equipo = $equipo2[$i]";
        $consulta = mysqli_query($conexion, $sql);
        while ($equipos = mysqli_fetch_array($consulta)) {
            $nombresEquipo2[] = $equipos["Nombre_Equipo"];
        }
    }

    //  Se obtiene el codigo del ultimo encuentro

    $sql = "SELECT count(Cod_Equipo1) as cantidadEncuentros FROM encuentro";
    $consulta = mysqli_query($conexion, $sql);
    $mayorCodigoEncuentro = mysqli_fetch_array($consulta);
    $cantidadEncuentros = $mayorCodigoEncuentro["cantidadEncuentros"];

    if ($cantidadEncuentros < 48) {
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

        for ($e = 1; $e <= 48; $e++) {

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
                } elseif ($f == 1 && $numAleatorio != $numAleatorio1 && $numAleatorio != $numAleatorio2 && $numAleatorio != $numAleatorio3) {
                    $numAleatorio2 = $numAleatorio;
                    $f++;
                } elseif ($f == 2 && $numAleatorio != $numAleatorio1 && $numAleatorio != $numAleatorio2 && $numAleatorio != $numAleatorio3) {
                    $numAleatorio3 = $numAleatorio;
                    $f++;
                }
            } while ($f < $limite);

            //  Se guarda la informacion adicional del nuevo encuentro

            $sql = "UPDATE encuentro SET Cod_Equipo1 = '".$equipo1[$e - 1]."', Nombre_Equipo1 = '".$nombresEquipo1[$e - 1]."', Nombre_Equipo2 = '".$nombresEquipo2[$e - 1]."',
                                        Cod_Equipo2 = '".$equipo2[$e - 1]."', idCancha = 1, Id_Juezuno = ".$juez[$numAleatorio1].",
                                        Id_Juezdos = ".$juez[$numAleatorio2].", Id_Jueztres = ".$juez[$numAleatorio3]."
                                    WHERE (Cod_Encuentro = $e)";
            $actualizar = mysqli_query($conexion, $sql);


            //  Se guarda el grupo del nuevo encuentro
            if ($e <= 6) {
                $sql = "UPDATE encuentro SET Grupo = 'A'
                WHERE (Cod_Encuentro = $e)";
                $actualizar = mysqli_query($conexion, $sql);
            } elseif ($e <= 12) {
                $sql = "UPDATE encuentro SET Grupo = 'B'
                WHERE (Cod_Encuentro = $e)";
                $actualizar = mysqli_query($conexion, $sql);
            } elseif ($e <= 18) {
                $sql = "UPDATE encuentro SET Grupo = 'C'
                WHERE (Cod_Encuentro = $e)";
                $actualizar = mysqli_query($conexion, $sql);
            } elseif ($e <= 24) {
                $sql = "UPDATE encuentro SET Grupo = 'D'
                WHERE (Cod_Encuentro = $e)";
                $actualizar = mysqli_query($conexion, $sql);
            } elseif ($e <= 30) {
                $sql = "UPDATE encuentro SET Grupo = 'E'
                WHERE (Cod_Encuentro = $e)";
                $actualizar = mysqli_query($conexion, $sql);
            } elseif ($e <= 36) {
                $sql = "UPDATE encuentro SET Grupo = 'F'
                WHERE (Cod_Encuentro = $e)";
                $actualizar = mysqli_query($conexion, $sql);
            } elseif ($e <= 42) {
                $sql = "UPDATE encuentro SET Grupo = 'G'
                WHERE (Cod_Encuentro = $e)";
                $actualizar = mysqli_query($conexion, $sql);
            } elseif ($e <= 48) {
                $sql = "UPDATE encuentro SET Grupo = 'H'
                WHERE (Cod_Encuentro = $e)";
                $actualizar = mysqli_query($conexion, $sql);
            }
        }
    }
    ?>


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