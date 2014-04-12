<?php
class DB {
    static $connection;
    static function connectDB($login,$password,$host,$db){
        try {
            self::$connection = new PDO("mysql:host=$host;dbname=$db", $login, $password);
        }catch(PDOException $e){
            echo 'Ошибка соединения с базой данных. Системнай информация: '.$e->getMessage();
            die;
        }
    }
}