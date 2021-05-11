<?PHP

/*
Se necesita recibir una hora y dependiendo del intervalo tambien recibido
calcular las horas siguientes
*/

$cantidad = 4;
$intervalo = 3;
$hora = "04:00:00";
$contador = 0;

$ultimaHora = $hora;
for ($i = 1; $i <= 8; $i++) {
    if ($contador < $cantidad) {
        if ($i == 1) {
            echo "<br> $i-" . $ultimaHora;
        } else {
            $ultimaHora = strtotime("+$intervalo hour", strtotime($ultimaHora));
            //$nuevafecha = strtotime ( '+13 minute' , strtotime ( $fecha ) ) ;
            //$nuevafecha = strtotime ( '+30 second' , strtotime ( $fecha ) ) ;
            $ultimaHora = date('H:i:s', $ultimaHora);
            echo "<br> $i-" . $ultimaHora;
        }
        $contador++;
    } else {
        $contador = 0;
        $ultimaHora = $hora;
        echo "<br> $i-" . $ultimaHora;
    }
}
