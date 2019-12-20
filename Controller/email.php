<?php 

require_once('Model/emailModel.php');


class email extends emailModel
{

    public function insertEmail($params=null)
    {
        echo json_encode(parent::insertEmail($params));
    }
 
    public function updateEmail($params=null)
    {
        echo json_encode(parent::updateEmail($params));
    }

    public function buscarEmail($params=null)
    {
        $nomeEmail = [];

        //Só entrar no loop quando existir agenda cadastrada
        if (parent::buscarEmail($params) !== false) {
            foreach (parent::buscarEmail($params) as $valor) {
                array_push($nomeEmail, $valor);
            }
        }

        echo json_encode($nomeEmail);

    }

}