<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--   CONTADOR DE LA INTERFAZ DE PUNTOS     -->
    <script type="text/javascript">
        //  VARIABLES DEL FRONTEND
        let counter = 0;
        let counterb = 0;
        //  VARIABLES DEL BACKEND
        let contadorJugadoraEquipo1 = 0;
        let contadorJugadoraEquipo2 = 0;

        function countingClicks(){
            document.getElementById("counting").innerHTML = ++counter;
            document.getElementById("puntosEquipo1").innerHTML = ++contadorJugadoraEquipo1;
        }
        function deductClicks(){
            if (counter >= 1) {
                document.getElementById("counting").innerHTML= --counter;
                document.getElementById("puntosEquipo1").innerHTML = --contadorJugadoraEquipo1;
            }
        }

        function countingClicksb(){
            document.getElementById("countingb").innerHTML = ++counterb;
            document.getElementById("puntosEquipo2").innerHTML = ++contadorJugadoraEquipo2;
        }
        function deductClicksb(){
            if (counterb >= 1) {
                document.getElementById("countingb").innerHTML= --counterb;
                document.getElementById("puntosEquipo2").innerHTML = --contadorJugadoraEquipo2;
            }
        }
    </script>
    <form action="recibirPuntos.php" method="post">
    <input type="hidden" name="puntosEquipo1" id="puntosEquipo1">
    <input type="hidden" name="puntosEquipo2" id="puntosEquipo2">
    </form>
    <!--    CONTADOR PARA INSRTAR NUMEROS EN LOS INPUT PARA MANDAR A LA BASE DE DATOS   -->
    
</body>
</html>
