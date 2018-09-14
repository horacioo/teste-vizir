<?php
ob_start();
header("Content-type:application/json");

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once '../classes/fontes.php';
require_once '../classes/controle.php';

use classes\controle;


if( !isset( $_GET['query'] )){exit();}
if (is_numeric($_GET['query']) ) {
   if($_GET['query']==0){ echo controle::buscaDDDs(); }
   if($_GET['query']==1){ echo controle::buscaPlanos(); }
}

ob_end_flush();