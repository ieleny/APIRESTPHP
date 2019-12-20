<?php

require_once('Model/agendaModel.php');

class agenda extends agendaModel
{
        
        
    //Listar os dados da Agenda
    public function listaAgenda()
    {
        $agenda = [];

        //Só entrar no loop quando existir agenda cadastrada
        if (parent::listAgenda() !== false) {
            foreach (parent::listAgenda() as $valor) {
                array_push($agenda, $valor);
            }
        }

        echo json_encode($agenda);

    }

    //Inserir Agenda 
    public function insertAgenda($params=null)
    {
        echo json_encode(parent::insertAgenda($params));
    }

    //Buscar Agenda
    public function buscarAgenda($params=null)
    {
        echo json_encode(parent::buscarAgendaId($params));
    }

    //Buscar Agenda
    public function buscarNome($params=null)
    {
        $agendaNome = [];

        //Só entrar no loop quando existir agenda cadastrada
        if (parent::buscarNome($params) !== false) {
            foreach (parent::buscarNome($params) as $valor) {
                array_push($agendaNome, $valor);
            }
        }

        echo json_encode($agendaNome);

    }

    //Editar Contato
    public function updateAgenda($params=null)
    {
        echo json_encode(parent::updateAgenda($params));
    }

    //Editar Contato
    public function deleteAgenda($params=null)
    {
        echo json_encode(parent::deleteAgenda($params));
    }

}
