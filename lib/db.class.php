<?php

/*class DB{

    private static $instance;
    private static $connection;

    public static function setInstance()
    {
        if(!self::$instance)
        {
            self::$instance = true;
            try{
                self::$connection = new PDO(Config::getSettings('db_dsn'), Config::getSettings('db_user'), Config::getSettings('db_password'));
            }catch (PDOException $e){
                echo 'DB connection failed: ' . $e->getMessage();
            }
        }
        return self::$instance;
    }

    public function connection()
    {
        return self::$connection;
    }

    public function query($sql){
        if(!$this->connection){
            return false;
        }
        $data = $this->connection()->prepare($sql);
        $data->execute();
        if(is_null($data)) {
            return array();
        }
        return $data->fetch(PDO::FETCH_ASSOC);
    }
}*/

class DB {

    protected $connection;

    public function __construct($host, $user, $password){
        try {
            $this->connection = new PDO($host, $user, $password);
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function query($sql){
        if(!$this->connection){
            return false;
        }

        $data = $this->connection->prepare($sql);
        $data->execute();
        if(is_bool($data)){
            return array();
        }
        return $data->fetchAll(PDO::FETCH_ASSOC);
    }
}