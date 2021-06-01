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
      <h3 class="tittleMain">OCTAVOS</h3>
    </div>
    <?php include("../../conexion/conexionServer.php"); ?>
    <div class="row">
      <?php
      // Sorteo terminado, se guarda el nuevo orden de los equipos y se toman los valores de posicion sorteada
      //y codigo equipo para ingresarlo a la tabla esquemas ronda2
      /* $sql1 = "SELECT posicionSorteada,Cod_Equipo FROM `equipos` ORDER BY posicionSorteada ASC";
      $consulta1 = mysqli_query($conexion, $sql1); */

      $sql = "SELECT Puntos_Ronda1, equipos.Nombre_Equipo FROM `encuentros_ganados` 
      INNER JOIN `equipos` ON equipos.Cod_Equipo = encuentros_ganados.Cod_Equipo 
      ORDER BY encuentros_ganados.posicionSorteada ASC";
      $consulta = mysqli_query($conexion, $sql);
      

      while ($equipoRonda1 = mysqli_fetch_array($consulta)) {
        $maxPuntaje1[] = $equipoRonda1["Nombre_Equipo"];
        $clasificados[] = $equipoRonda1["Puntos_Ronda1"];
      }

      //  SE CREA LA LISTA "listaTabla" DE de los puestos que ocupan los equipos, 
      //  PARA ORDENAR LOS EQUIPOS SEGUN ESTA LISTA

      $listaTabla = [];
      $nombreGrupos = ["LLAVE UNO", "LLAVE DOS", "LLAVE TRES", "LLAVE CUATRO", "LLAVE CINCO", "LLAVE SEIS", "LLAVE SIETE", "LLAVE OCHO"];
      $puntosCabecera = ["PUNTOS", "PUNTOS", "PUNTOS", "PUNTOS", "PUNTOS", "PUNTOS", "PUNTOS", "PUNTOS"];
      for ($i = 0; $i < 8; $i++) {
      ?>
      <div class="col-xs-12 col-sm-12 col-md-3">
          <table class="table table-hover">
            <thead>
              <tr>
                <td class="columnaCabecera">
                  <p>
                    <b>
                      <center> <?php echo $nombreGrupos[$i]; ?></center>
                    </b>
                  </p>
                </td>
                <td class="columnaCabecera">
                  <p>
                    <b>
                      <center>
                      <?php echo $puntosCabecera[$i]; ?>
                      </center>
                    </b>
                  </p>
                </td>
              </tr>
            </thead>
            <tbody>
              <?php
              for ($j = 0; $j < 4; $j++) {
              ?>
                <tr>
                  <td>
                    <center>
                      <?php
                      if ($i == 0) {
                        echo $maxPuntaje1[$j];
                      } else if ($i == 1) {
                        echo $maxPuntaje1[$j + 4];
                      } else if ($i == 2) {
                        echo $maxPuntaje1[$j + 8];
                      } else if ($i == 3) {
                        echo $maxPuntaje1[$j + 12];
                      } else if ($i == 4) {
                        echo $maxPuntaje1[$j + 16];
                      } else if ($i == 5) {
                        echo $maxPuntaje1[$j + 20];
                      } else if ($i == 6) {
                        echo $maxPuntaje1[$j + 24];
                      } else if ($i == 7) {
                        echo $maxPuntaje1[$j + 28];
                      }
                      ?>
                    </center>
                  </td>
                  <td>
                    <center>
                    <?php
                      if ($i == 0) {
                        echo $clasificados[$j];
                      } else if ($i == 1) {
                        echo $clasificados[$j + 4];
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
    </div>
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