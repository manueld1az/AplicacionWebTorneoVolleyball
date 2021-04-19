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
      <h3 class="tittleMain">Grupos</h3>
    </div>
    <?php include("../../conexion/conexionServer.php"); ?>
    <div class="row">

      <?php
      $nombreGrupos = ["A", "B", "C", "D", "E", "F", "G", "H"];
      $sql = "SELECT Nombre_Equipo FROM equipos";
      $consulta = mysqli_query($conexion, $sql);

      while ($equipos = mysqli_fetch_array($consulta)) {
        $equipo[] = $equipos["Nombre_Equipo"];
      }

      $listaTabla = [];

      $x = 0;
      $num = 32;

      while ($x < $num) {
        $num_aleatorio = rand(0, 31);
        if (!in_array($num_aleatorio, $listaTabla)) {
          array_push($listaTabla, $num_aleatorio);
          $x++;
        }
      }

      /*echo "<pre>";
      print_r($listaTabla);
      echo "</pre>";*/

      for ($i = 0; $i < 8; $i++) {
      ?>
        <div class="col-xs-12 col-sm-12 col-md-3">
          <table class="table table-hover">
            <thead>
              <tr>
                <td class="columnaCabecera">
                  <p>
                    <b>
                      <center>GRUPO <?php echo $nombreGrupos[$i]; ?></center>
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
                        echo $listaTabla[$j];
                      } else if ($i == 1) {
                        echo $listaTabla[$j + 4];
                      } else if ($i == 2) {
                        echo $listaTabla[$j + 8];
                      } else if ($i == 3) {
                        echo $listaTabla[$j + 12];
                      } else if ($i == 4) {
                        echo $listaTabla[$j + 16];
                      } else if ($i == 5) {
                        echo $listaTabla[$j + 20];
                      } else if ($i == 6) {
                        echo $listaTabla[$j + 24];
                      } else if ($i == 7) {
                        echo $listaTabla[$j + 28];
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

  <!-- Scripts de boostrap-->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
  <!--Scripts cdn de font awesome-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw==" crossorigin="anonymous"></script>
</body>

</html>