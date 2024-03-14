<?php

namespace toniDespierta;

include_once 'conexion.php';
include_once 'IndexModelo.php';

$llegadas = new \IndexModelo();

$listado = $llegadas->listado();
//die(var_dump($listado));
require_once 'index.php';

