<?php
include_once 'config.php';
include_once 'DbConnect.php';

class Mysql implements DbConnect{
    public static $handle;

    public function __construct()
    {
        if(!self::$handle){
            $handle = $this->connect();
            mysqli_set_charset($handle,"utf8");
            self::$handle = $handle;
        }
        return self::$handle;
    }

    public function connect()
    {
        // TODO: Implement connect() method.
        return mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
    }

    public function add($sql)
    {
        // TODO: Implement add() method.
        $this->query($sql);
        return mysqli_affected_rows(self::$handle);
    }

    public function select($sql)
    {
        // TODO: Implement select() method.
        $set = $this->query($sql);
        if(!$set)return false;
        $array = array();
        while ($res = mysqli_fetch_assoc($set)){
            $array[] = $res;
        }

        return $array;
    }

    public function update($sql)
    {
        // TODO: Implement update() method.
        $this->query($sql);
        return mysqli_affected_rows(self::$handle);
    }

    private function query($sql){
        return mysqli_query(self::$handle,$sql);
    }
}