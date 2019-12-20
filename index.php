<?php

    require_once 'Service/rest.php';

    //HEADER DE ENVIO
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');

    //TRANSFORMAR O A URL EM UM ARRAY
    $url    = $_SERVER['REQUEST_URI'];
    $url    = array_filter(preg_split('/[\/?]/', $url));
    
    //Verificar se existir parametros
    if(isset($url[4])){
        new rest($url[3],$url[4]);
    }else{
        new rest($url[3]);
    }
    
