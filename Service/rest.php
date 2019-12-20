<?php

require_once('Route/router.php');

class rest
{
    public function __construct($url, $parametros = null)
    {
        $this->verificarFunction($url, $parametros);
    }

    public function listarAgenda($parametros)
    {
        router::post('agenda', 'listaAgenda');
    }

    public function insertAgenda($parametros=null)
    {
        router::post('agenda', 'insertAgenda',$parametros);
    }

    public function updateAgenda($parametros=null)
    {
        router::put('agenda', 'updateAgenda',$parametros);
    }

    public function delete($parametros=null)
    {
        router::delete('agenda', 'deleteAgenda',$parametros);
    }

    public function buscarAgenda($parametros=null)
    {
        router::post('agenda', 'buscarAgenda',$parametros);
    }

    public function buscarNome($parametros=null)
    {
        router::post('agenda', 'buscarNome',$parametros);
    }

    public function insertEmail($parametros=null)
    {
        router::post('email', 'insertEmail',$parametros);
    }

    public function updateEmail($parametros=null)
    {
        router::put('email', 'updateEmail',$parametros);
    }

    public function buscarEmail($parametros=null)
    {
        router::post('email', 'buscarEmail',$parametros);
    }

    private function verificarFunction($url, $parametros)
    {
        if (method_exists($this, $url)) {
            $this->$url($parametros);
        } else {
            echo ['erro' => 'ERRO, URL NÃO ENCONTRADA'];
        }
    }


}
