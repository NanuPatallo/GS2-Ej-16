<?php

header('Content-Type: application/json');

require_once '../../modelo/Jugadores.php';
require_once 'request/nuevoRequest.php';
require_once 'responses/nuevoResponse.php';

$json = file_get_contents('php://input', true);
// Convertir el body en un objeto
$req = json_decode($json);



$res = new NuevoResponse();
$res->IsOk = true;



$CantJugador = 0;

foreach ($req->ListJugadores as $Jugador) {
    $CantJugador = $CantJugador + 1;
}
if ($CantJugador >= 1 && $CantJugador <= 5) {
    echo json_encode($res);
} else {

    $res->IsOk = false;
    $res->Mensaje = 'El equipo posee ' . $CantJugador . ', debe poseer entre 1 y 5 jugadores.';

    echo json_encode($res);
}
