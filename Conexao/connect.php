<?php

class connect
{
         
    //ALTERAR DE ACORDO COM O BANCO

    //DADOS DO BANCO NA NUVEM
    // CONST HOST    = 'fdb20.atspace.me';
    // CONST DB_NAME = '3140397_agendabanco';
    // CONST USER    = '3140397_agendabanco';
    // CONST PASS    = 'asus123456';

    //DADOS DO BANCO LOCALHOST
    const HOST    = 'localhost:3306';
    const DB_NAME = '3140397_agendabanco';
    const USER    = '';
    const PASS    = '';
        
    private static $instance;
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO('mysql:host='.SELF::HOST.';dbname='.SELF::DB_NAME, SELF::USER, SELF::PASS);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
        return self::$instance;
    }
    
    public static function prepare($sql)
    {
        return self::getInstance()->prepare($sql);
    }
}

?> 