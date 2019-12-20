<?php

require_once('Conexao/connect.php');


class agendaModel
{
    private $conn;
        
    public function __construct()
    {
        $this->conn = new connect();
    }
        
    protected function listAgenda()
    {
        try{
            return $this->conn::getInstance()->query("SELECT agenda.nome, agenda.endereco , agenda.nascimento, agenda.telefone,email.email,email.id_email FROM agenda LEFT JOIN email ON agenda.id_agenda = email.id_agenda")->fetchAll();
        }catch(PDOException $e){
            return ["Error:" => $e->getMessage()];
        }
        
    }
        
    protected function insertAgenda($params)
    {

        try {
            $execute = $this->conn::getInstance()->prepare('
                    INSERT INTO agenda
                            (
                                nome,
                                endereco,
                                nascimento,
                                telefone
                            )
                            VALUES
                            (
                                :nome,
                                :endereco,
                                :nascimento,
                                :telefone
                            )
            ');

            $execute->execute(
                [
                    ':nome'         => $params['nome'],
                    ':endereco'     => $params['endereco'],
                    ':nascimento'   => $params['nascimento'],
                    ':telefone'     => $params['telefone']
                ]
            );

            return $this->buscarAgendaId(
                                        ['id_agenda' => $this->conn::getInstance()->lastInsertId()]
                                      );

        }catch(PDOException $e){
            return ["Error:" => $e->getMessage()];
        }

    }

    protected function updateAgenda($params)
    {
        try {

            if (array_key_exists("id_agenda",$params)) {
                
                $join  = [];
                $query = '';

                foreach($params as $index => $value) {
                    if ( $index !== 'id_agenda' ) { 
                        array_push($join,"$index = '$value'");
                    }
                }

                foreach ($join as $index => $value) {
                        if($index !== 0){
                            $query .= ",".$value;
                        }else{
                            $query .= $value;
                        }
                }

                $this->conn::getInstance()->query('
                        UPDATE agenda
                                SET 
                                    '. $query .'
                        WHERE 
                                id_agenda = '. $params['id_agenda'] .'
                ');

                return $this->buscarAgendaId(['id_agenda' => $params['id_agenda']]);

            }else{
                return ['error' => 'É preciso informar o id_agenda'];
            }

        }catch(PDOException $e){
            return ["Error:" => $e->getMessage()];
        }
    }

    protected function  deleteAgenda($params)
    {
        try {

            if (array_key_exists("id_agenda",$params)) {

                $this->conn::getInstance()->query('
                        DELETE FROM 
                            agenda
                        WHERE 
                                id_agenda = '. $params['id_agenda'] .'
                ');

                $this->conn::getInstance()->query('
                        DELETE FROM 
                            email
                        WHERE 
                                id_agenda = '. $params['id_agenda'] .'
                ');

                return ['retorno' => 'Dados deletado com sucesso'];

            }else{
                return ['error' => 'É preciso informar o id_agenda'];
            }

        }catch(PDOException $e){
            return ["Error:" => $e->getMessage()];
        }
    }


    //Listar a agenda de acordo com o id_agenda
    protected function buscarAgendaId($id)
    {
        try{
            return $this->conn::getInstance()->query("SELECT * FROM agenda WHERE id_agenda =".$id['id_agenda'])->fetch(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            return ["Error:" => $e->getMessage()];
        }

    }

    //Listar a agenda de acordo com o nome
    protected function buscarNome($nome)
    {
        try{
            return $this->conn::getInstance()->query("SELECT * FROM agenda WHERE nome like '%".$nome['nome']."%'")->fetchAll();
        }catch(PDOException $e){
            return ["Error:" => $e->getMessage()];
        }
        
    }


}
