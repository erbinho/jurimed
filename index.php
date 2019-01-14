<?php
//==EXIBIR ERROS NA PAGINA ERRO==//
error_reporting(E_ALL);
ini_set("display_errors", 1);

session_start();

require 'config.php';
require 'vendor/autoload.php';

$core = new Core\Core();
$core->run();
