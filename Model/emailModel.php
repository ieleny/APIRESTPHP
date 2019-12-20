<?php

require_once('Conexao/connect.php');


class emailModel
{
    private $conn;
        
    public function __construct()
    {
        $this->conn = new connect();
    }
        
    protected function insertEmail($params)
    {

        try {

            if (array_key_exists("id_agenda", $params)) {

                $execute = $this->conn::getInstance()->prepare('
                        INSERT INTO email
                                (
                                    id_agenda,
                                    email
                                )
                                VALUES
                                (
                                    :id_agenda,
                                    :email
                                )
                ');

                $execute->execute(
                    [
                        ':email'                => $params['email'],
                        ':id_agenda'            => $params['id_agenda']
                    ]
                );

                return $this->buscarId(
                    ['id_email' => $this->conn::getInstance()->lastInsertId()]
                );

            }else{
                return ['error' => 'É preciso informar o id_agenda'];
            }

        }catch(PDOException $e){
            return ["Error:" => $e->getMessage()];
        }

    }

    protected function updateEmail($params)
    {
        try {

            if ( array_key_exists("id_email",$params) ) {
                
                $join  = [];
                $query = '';

                foreach($params as $index => $value) {
                    if ( $index !== 'id_email' ) { 
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
                        UPDATE email
                                SET 
                                    '. $query .'
                        WHERE 
                                id_email = '. $params['id_email'] .'
                ');

                return $this->buscarId($params['id_email']);

            }else{
                return ['error' => 'É preciso informar o  id_email'];
            }

        }catch(PDOException $e){
            return ["Error:" => $e->getMessage()];
        }
    }

    protected function buscarEmail($email)
    {
        try{
            return $this->conn::getInstance()->query("SELECT * FROM email WHERE email like '%".$email['email']."%'")->fetchAll();
        }catch(PDOException $e){
            return ["Error:" => $e->getMessage()];
        }

    }

    protected function buscarId($id)
    {
        try{
            return $this->conn::getInstance()->query("SELECT * FROM email WHERE id_email = ".$id)->fetchAll();
        }catch(PDOException $e){
            return ["Error:" => $e->getMessage()];
        }

    }




}
