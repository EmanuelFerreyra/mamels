<?php


class Base
{
    private $host;
    private $user;
    private $password;
    private $db_name;

    private $dbh;
    private $stmt;
    private $error;


    public function __construct()
    {
        $dsn = 'mysql:host='.$this->host.';dbname='.$this->db_name;
        $option = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        //Crear una Instancia de PDO

        try {
            $this->dbh = new PDO( $this->user,$this->password, $option );
        } catch (PDOException $e) {
            print $this->error = $e->getMessage();
        }
    }
}