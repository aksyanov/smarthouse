<?php
class DB {
    static $connection = null;
    static function connectDB($login,$password,$host,$db){
        try {
            self::$connection = new PDO("mysql:host=$host;dbname=$db", $login, $password);
        }catch(PDOException $e){
            echo 'Ошибка соединения с базой данных. Системнай информация: '.$e->getMessage();
            die;
        }
    }
    static function query($sql){
        if(self::$connection == null){
            echo 'Нет соединения с базой данных';
            die;
        }
        return self::$connection->query($sql);
    }
}