<?php

ob_start();
header("Content-type:application/json");
require_once '../classes/fontes.php';
require_once '../classes/controle.php';

use classes\controle;

$informacao = $_GET['ddd'];
if (is_numeric($informacao)) {
    echo json_encode(controle::busca($informacao));
}
ob_end_flush();
