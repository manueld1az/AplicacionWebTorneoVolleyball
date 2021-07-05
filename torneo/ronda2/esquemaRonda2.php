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
        <a href="../ronda2/menuRonda2.html">
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
      $letrasDeGrupo= ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
      for ($i=0; $i<8; $i++) {
          $sql = "SELECT Cod_Equipo, Nombre_Equipo FROM `equipos` WHERE grupo= '$letrasDeGrupo[$i]' ORDER BY Ptos_Equipo DESC LIMIT 2";
          $consulta = $conexion->query($sql);
          if ($consulta->num_rows > 0) {
              while ($equipoRonda2 = $consulta->fetch_assoc()) {
                  $equipo1[] = $equipoRonda2["Nombre_Equipo"];
                  $codEquipo[]= $equipoRonda2["Cod_Equipo"];
              }
          }
      }
      $contador= 0;
      for ($i=0; $i<16; $i++) {
          $letra="";
          if ($i%2==0) {
              $contador++;
              $letra = 'A';
          } else {
              $letra = 'B';
          }

          $sql = "UPDATE `equipos` SET octavos = '$contador$letra' WHERE Cod_Equipo = $codEquipo[$i] ";
          $consulta = $conexion->query($sql);
      }
      //  SE CREA LA LISTA "listaTabla" DE de los puestos que ocupan los equipos,
      //  PARA ORDENAR LOS EQUIPOS SEGUN ESTA LISTA
     /*  echo "<pre>";
      print_r($equipo1);
      echo "</pre>"; */
      $listaTabla = [];
      $nombreGrupos = ["LLAVE UNO", "LLAVE DOS", "LLAVE TRES", "LLAVE CUATRO", "LLAVE CINCO", "LLAVE SEIS", "LLAVE SIETE", "LLAVE OCHO"];
      for ($i = 0; $i < 8; $i++) {
          ?>
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
                      if ($i == 0) {
                          echo $equipo1[0];
                      } elseif ($i == 1) {
                          echo $equipo1[2];
                      } elseif ($i == 2) {
                          echo $equipo1[ 4];
                      } elseif ($i == 3) {
                          echo $equipo1[ 6];
                      } elseif ($i == 4) {
                          echo $equipo1[ 8];
                      } elseif ($i == 5) {
                          echo $equipo1[ 10];
                      } elseif ($i == 6) {
                          echo $equipo1[ 12];
                      } elseif ($i == 7) {
                          echo $equipo1[ 14];
                      } ?>
                </center>
              </td>
            </tr>
            <tr>
              <td>
                <center>
                  <?php
                      if ($i == 0) {
                          echo $equipo1[15];
                      } elseif ($i == 1) {
                          echo $equipo1[13];
                      } elseif ($i == 2) {
                          echo $equipo1[11];
                      } elseif ($i == 3) {
                          echo $equipo1[9];
                      } elseif ($i == 4) {
                          echo $equipo1[7];
                      } elseif ($i == 5) {
                          echo $equipo1[5];
                      } elseif ($i == 6) {
                          echo $equipo1[3];
                      } elseif ($i == 7) {
                          echo $equipo1[1];
                      } ?>
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