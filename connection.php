<?php


class Connection {

    private static $instance;

    public static function getConnection() {

        if(!isset(self::$instance)):
            self::$instance = new \PDO('mysql:host=localhost;dbname=cadastro;charset=utf8', 'root', '');
        endif;

        return self::$instance;
        
    }
}
