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

      $sql = "SELECT Ptos_Equipo, Nombre_Equipo FROM `equipos` WHERE posicionSorteada < 4 ORDER BY Ptos_Equipo DESC";
      $consulta = $conexion->query($sql);
      
      if($consulta->num_rows > 0 ){
        while ($equipoRonda2 = $consulta->fetch_assoc()) {
          $equipo1[] = $equipoRonda2["Nombre_Equipo"];
          /* $clasificados[] = $equipoRonda2["Ptos_Equipo"]; */
        }
      }

      $sql2 = "SELECT * FROM `equipos` WHERE (posicionSorteada > 3) AND (posicionSorteada < 8) 
      AND (Ptos_Equipo = (SELECT MAX(Ptos_Equipo) FROM equipos WHERE (posicionSorteada > 3) 
      AND (posicionSorteada < 8)))";
      $consulta2 = $conexion->query($sql2);
      
      if($consulta2->num_rows > 0 ){
        while ($equipoRonda2 = $consulta2->fetch_assoc()) {
          $equipo2[] = $equipoRonda2["Nombre_Equipo"];
          /* $clasificados[] = $equipoRonda2["Ptos_Equipo"]; */
        }
      }

      $sql3 = "SELECT * FROM `equipos` WHERE (posicionSorteada > 7) AND (posicionSorteada < 12) 
      AND (Ptos_Equipo = (SELECT MAX(Ptos_Equipo) FROM equipos WHERE (posicionSorteada > 7) 
      AND (posicionSorteada < 12)))";
      $consulta3 = $conexion->query($sql3);
      
      if($consulta3->num_rows > 0 ){
        while ($equipoRonda2 = $consulta3->fetch_assoc()) {
          $equipo3[] = $equipoRonda2["Nombre_Equipo"];
          /* $clasificados[] = $equipoRonda2["Ptos_Equipo"]; */
        }
      }

      $sql4 = "SELECT * FROM `equipos` WHERE (posicionSorteada > 11) AND (posicionSorteada < 16) 
      AND (Ptos_Equipo = (SELECT MAX(Ptos_Equipo) FROM equipos WHERE (posicionSorteada > 11) 
      AND (posicionSorteada < 16)))";
      $consulta4 = $conexion->query($sql4);
      
      if($consulta4->num_rows > 0 ){
        while ($equipoRonda2 = $consulta4->fetch_assoc()) {
          $equipo4[] = $equipoRonda2["Nombre_Equipo"];
          /* $clasificados[] = $equipoRonda2["Ptos_Equipo"]; */
        }
      }

      $sql5 = "SELECT * FROM `equipos` WHERE (posicionSorteada > 15) AND (posicionSorteada < 20) 
      AND (Ptos_Equipo = (SELECT MAX(Ptos_Equipo) FROM equipos WHERE (posicionSorteada > 15) 
      AND (posicionSorteada < 20)))";
      $consulta5 = $conexion->query($sql5);
      
      if($consulta5->num_rows > 0 ){
        while ($equipoRonda2 = $consulta5->fetch_assoc()) {
          $equipo5[] = $equipoRonda2["Nombre_Equipo"];
          /* $clasificados[] = $equipoRonda2["Ptos_Equipo"]; */
        }
      }

      $sql6 = "SELECT * FROM `equipos` WHERE (posicionSorteada > 19) AND (posicionSorteada < 24) 
      AND (Ptos_Equipo = (SELECT MAX(Ptos_Equipo) FROM equipos WHERE (posicionSorteada > 19) 
      AND (posicionSorteada < 24)))";
      $consulta6 = $conexion->query($sql6);
      
      if($consulta6->num_rows > 0 ){
        while ($equipoRonda2 = $consulta6->fetch_assoc()) {
          $equipo6[] = $equipoRonda2["Nombre_Equipo"];
          /* $clasificados[] = $equipoRonda2["Ptos_Equipo"]; */
        }
      }

      $sql7 = "SELECT * FROM `equipos` WHERE (posicionSorteada > 23) AND (posicionSorteada < 28) 
      AND (Ptos_Equipo = (SELECT MAX(Ptos_Equipo) FROM equipos WHERE (posicionSorteada > 23) 
      AND (posicionSorteada < 28)))";
      $consulta7 = $conexion->query($sql7);
      
      if($consulta7->num_rows > 0 ){
        while ($equipoRonda2 = $consulta7->fetch_assoc()) {
          $equipo7[] = $equipoRonda2["Nombre_Equipo"];
          /* $clasificados[] = $equipoRonda2["Ptos_Equipo"]; */
        }
      }

      $sql8 = "SELECT * FROM `equipos` WHERE (posicionSorteada > 27) AND (posicionSorteada < 32) 
      AND (Ptos_Equipo = (SELECT MAX(Ptos_Equipo) FROM equipos WHERE (posicionSorteada > 27) 
      AND (posicionSorteada < 32)))";
      $consulta8 = $conexion->query($sql8);
      
      if($consulta8->num_rows > 0 ){
        while ($equipoRonda2 = $consulta8->fetch_assoc()) {
          $equipo8[] = $equipoRonda2["Nombre_Equipo"];
          /* $clasificados[] = $equipoRonda2["Ptos_Equipo"]; */
        }
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
                <!-- <td class="columnaCabecera">
                  <p>
                    <b>
                      <center>
                      <?php echo $puntosCabecera[$i]; ?>
                      </center>
                    </b>
                  </p>
                </td> -->
              </tr>
            </thead>
            <tbody>
              <?php
              for ($j = 0; $j < 1; $j++) {
              ?>
                <tr>
                  <td>
                    <center>
                      <?php
                      if ($i == 0) {
                        echo $equipo1[$j];
                      } else if ($i == 1) {
                        echo $equipo2[$j];
                      } else if ($i == 2) {
                        echo $equipo3[$j];
                      } else if ($i == 3) {
                        echo $equipo4[$j];
                      } else if ($i == 4) {
                        echo $equipo5[$j];
                      } else if ($i == 5) {
                        echo $equipo6[$j];
                      } else if ($i == 6) {
                        echo $equipo7[$j];
                      } else if ($i == 7) {
                        echo $equipo8[$j];
                      }
                      ?>
                    </center>
                  </td>
                  <!-- <td>
                    <center>
                    <?php
                      if ($i == 0) {
                        echo $clasificados[$j];
                      } else if ($i == 1) {
                        echo $clasificados[$j + 4];
                      }else if ($i == 2) {
                        echo $clasificados[$j + 8];
                      }else if ($i == 3) {
                        echo $clasificados[$j + 12];
                      }else if ($i == 4) {
                        echo $clasificados[$j + 16];
                      }else if ($i == 5) {
                        echo $clasificados[$j + 20];
                      }else if ($i == 6) {
                        echo $clasificados[$j + 24];
                      }else if ($i == 7) {
                        echo $clasificados[$j + 28];
                      }
                      ?>
                    </center>
                  </td> -->
                </tr>
              <?php
              }
              ?>
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
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <!--Scripts cdn de font awesome-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw==" crossorigin="anonymous"></script>
</body>

</html>