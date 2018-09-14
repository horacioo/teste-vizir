<?php
ob_start();
header("Content-type:application/json");

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once '../classes/fontes.php';
require_once '../classes/controle.php';

use classes\controle;

/********************************************************************/
if(isset($_GET['ddd'])){ controle::$array['ddd']=$_GET['ddd'];}        else {exit();}
if(isset($_GET['ddd2'])){ controle::$array['ddd2']=$_GET['ddd2'];}     else {exit();}
if(isset($_GET['tempo'])){ controle::$array['tempo']=$_GET['tempo'];}  else {exit();}
if(isset($_GET['plano'])){ controle::$array['plano']=$_GET['plano'];}  else {exit();}
/********************************************************************/

echo json_encode(controle::localizaDados()::$array);

ob_end_flush();