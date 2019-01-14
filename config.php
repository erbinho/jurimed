<?php
date_default_timezone_set('America/Sao_Paulo');
require 'environment.php';
require 'functions.php';

global $config; //<--Armazenamento das constantes
$config = array();

if(ENVIRONMENT == "development"){
    define("BASE_URL", "http://jurimed.jur.sg/home");
    $config['dbname'] = 'sis';
    $config['host'] = 'jurimed.jur.sg';
    $config['dbuser'] = 'marcio';
    $config['dbpass'] = 'jurimed123!@#';
}else{
    define("BASE_URL", "http://www.jurimed.com.br/home");
    $config['dbname'] = 'sis';
    $config['host'] = 'jurimed.com.br';
    $config['dbuser'] = 'marcio';
    $config['dbpass'] = 'jurimed123!@#';
}

global $db;
try {
    $db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);
} catch(PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
}
