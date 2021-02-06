<?php

class Db{

    public static function getConnection(){
        $paramsPath = ROOT.'/config/db_params.php';
        $params = include($paramsPath);

        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']};port=3307";
        $db = new PDO($dsn, $params['user'], $params['password']);

        return $db;
    }
}