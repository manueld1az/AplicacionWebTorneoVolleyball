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
  <title>Semifinales</title>
  <link rel="stylesheet" href="../../nuevoTorneo/listados/listas.css" />
</head>

<body>
  <header class="container">
    <div class="row">
      <div class="col-auto">
        <a href="../ronda4/menuRonda4.html">
          <h1><i class="fas fa-arrow-alt-circle-left"></i></h1>
        </a>
      </div>
      <div class="col-auto me-auto">
        <a href="../../index.php">
          <h1><i class="fas fa-volleyball-ball"></i> SGTV</h1>
        </a>
      </div>
      <div class="col-auto">
        <button class="btn button2" type="button" onclick="window.print(); ">
          <b>Imprimir</b>
        </button>
      </div>
    </div>
  </header>
  <main class="container main">
    <div class="container">
      <h3 class="tittleMain">Semifinales</h3>
    </div>
    <?php include("../../conexion/conexionServer.php"); ?>
    <div class="row">
      <?php

        // ES EL CONTADOR QUE ENUMERA LOS 8 ENCUENTROS DE LOS OCTAVOS SE USA PARA CONSULTAR LOS RESULTADOS DE DICHOS ENCUENTROS
        // VA DE 1 A 8 HACIENDO REFERENCIA A LOS OCHO ENCUENTROS DE LOS OCTAVOS Y LAS 8 VECES QUE ITERA EL FOR
        $contador = 1;
        // UN CONTADOR QUE INDENTIFICA LOS ENCUENTROS QUE SE CREAN A DESIGNAR LOS CLASIFICADOS A SIGUIENTE RONDA
        $idEncuentros = 1;
        for ($i=55; $i <= 59; $i++) {

            // SE CONSULTAN LOS PUNTAJES DE LOS ENCUENTROS DE LOS OCTAVOS DE FINAL
            $sql="SELECT Ptos_Equipo1, Ptos_Equipo2 FROM encuentro WHERE Cod_Encuentro = $i;";
            $consulta = $conexion->query($sql);
            $registro = $consulta->fetch_assoc();
            $puntosEquipo1 = $registro['Ptos_Equipo1'];
            $puntosEquipo2 = $registro['Ptos_Equipo2'];

            // SE DETERMINA EL GANADOR DEL ENCUENTRO Y SE CLASIFICA A ESTA NUEVA RONDA DE CUARTOS
            // SE CONSULTA EL CODIGO DEL EQUIPO GANADOR PARA ASIGNARLE SU POSICION EN LA SEGUNDA RONDA
            if ($puntosEquipo1 > $puntosEquipo2) {
                $sql = "SELECT Cod_Equipo1 FROM encuentro WHERE Cod_Encuentro = $i;";
                $consulta = $conexion->query($sql);
                $registro = $consulta->fetch_assoc();
                $codigoEquipo = $registro['Cod_Equipo1'];
            } else {
                $sql = "SELECT Cod_Equipo2 FROM encuentro WHERE Cod_Encuentro = $i;";
                $consulta = $conexion->query($sql);
                $registro = $consulta->fetch_assoc();
                $codigoEquipo = $registro['Cod_Equipo2'];
            }

            // SE CONSULTA EL CODIGO DEL EQUIPO GANADOR DE CADA ENCUENTRO DE LOS OCTAVOS
            $sql = "SELECT octavos FROM equipos WHERE Cod_Equipo = $codigoEquipo;";
            $consulta = $conexion->query($sql);
            $registro = $consulta->fetch_assoc();
            $casillaOctavos = $registro['octavos'];

            // SE EVALUA QUE EL NUMERO DEL ENCUENTRO QUE JUGO EL EQUIPO GANADOR PARA DE FINIR EL NUMERO
            // Y LETRA DE SU PROXIMO PARTIDO
            $posicionLetraA = "$contador"."A";
            $posicionLetraB = "$contador"."B";
            if ($casillaOctavos == $posicionLetraA || $casillaOctavos == $posicionLetraB) {

                // SE DEFINE EL PROXIMO ENCUENTRO PARA CADA EQUIPO ASIGNANDOLE SU NUMERO Y LETRA
                // SE ACTUALIZA EN BASE DE DATOS LA COLUMNA CUARTOS CON EL NUMERO Y LETRA CORRESPPONDIENE
                // DE LOS EQUIPOS CLASIFICADOS A LA SIGUIENTE RONDA
                if ($contador % 2 != 0) {
                    $sql = "UPDATE id17287989_torneovoleibol.equipos SET cuartos = $idEncuentros"."A WHERE Cod_Equipo = $codigoEquipo";
                    $actualizar = $conexion->query($sql);
                // echo "El nuevo encuentro del equipo: $codigoEquipo es el : $idEncuentros"."A de la siguiente ronda<br>";
                } else {
                    $sql = "UPDATE id17287989_torneovoleibol.equipos SET cuartos = $idEncuentros"."B WHERE Cod_Equipo = $codigoEquipo";
                    $actualizar = $conexion->query($sql);
                    // echo "El nuevo encuentro del equipo: $codigoEquipo es el : $idEncuentros"."B de la siguiente ronda<br>";
                    $idEncuentros++;
                }
            }
            $contador++;
        }

          // SE CONSULTAN LOS EQUIPOS CLASIFICADOS PARA GUARDARLOS EN EL ARRAY EQUIPO1 PARA USARLO EN LA TABLA DEL ESQUEMA
          $sql = "SELECT Nombre_Equipo FROM `equipos` WHERE semifinales IS NOT NULL ORDER BY semifinales;";
          $consulta = $conexion->query($sql);
          while ($equipoRonda3 = $consulta->fetch_assoc()) {
              $equipo1[] = $equipoRonda3["Nombre_Equipo"];
          }

      // ESTE ES EL INDICE QUE SE MANEJA AL LISTAR LOS EQUIPOS DEL ARRAY EQUIPO1 QUE AUMENTA CADA QUE SE MUESTRE UN ENCUENTRO
      $contador = 0;
      $nombreGrupos = ["LLAVE UNO", "LLAVE DOS"];
      for ($i = 0; $i < 2; $i++) {
          if ($i %2 == 0 && $i != 0) {
              $contador += 2;
          } elseif ($i %2 != 0) {
              $contador+=2;
          } ?>
      <div class="col-xs-12 col-sm-12 col-md-3">
        <table class="table table-hover">
          <thead>
            <tr>
              <td class="columnaCabecera">
                <p>
                  <b>
                    <center> <?php echo $nombreGrupos[$i]; ?>
                    </center>
                  </b>
                </p>
              </td>
            </tr>
          </thead>
          <tbody>

            <tr>
              <td>
                <center>
                  <?php
                  echo $equipo1[$contador]
                  ?>
                </center>
              </td>
            </tr>
            <tr>
              <td>
                <center>
                  <?php
                  echo $equipo1[$contador + 1]
                  ?>
                </center>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <?php
      }
      $conexion->close();
      ?>
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