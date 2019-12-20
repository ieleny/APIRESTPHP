<?php

require_once 'Controller/agenda.php';
require_once 'Controller/email.php';

//Classe que gera a rota da API
class router
{
    public static function post($classe, $metodo,$params=null)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $conteudoControl = new $classe();
            $conteudoControl->$metodo(self::arrayValueCampos($params));
        } else {
            echo json_encode("[]");
        }
    }

    public static function put($classe, $metodo,$params=null)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            $conteudoControl = new $classe();
            $conteudoControl->$metodo(self::arrayValueCampos($params));
        } else {
            echo json_encode("[]");
        }
    }

    public static function delete($classe, $metodo,$params=null)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            $conteudoControl = new $classe();
            $conteudoControl->$metodo(self::arrayValueCampos($params));
        } else {
            echo json_encode("[]");
        }
    }
    
    public static function arrayValueCampos($url)
    {
        //TRANSFORMAR OS CAMPOS
        $nomeCampo  = [];
        $valorCampo = [];
        $campos   = array_filter(preg_split('/[=&]/', $url));

        foreach($campos as $index => $value) {
            if($index % 2 == 0){
                array_push($nomeCampo,$value);
            }else{
                array_push($valorCampo,str_replace('%20',' ',$value));
            }
        }

        return array_combine($nomeCampo, $valorCampo);
    }


}
