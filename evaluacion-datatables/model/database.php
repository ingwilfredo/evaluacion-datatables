<?php
class Database
{
    public static function Menu()
    {
        $pdo = new PDO('mysql:host=localhost;dbname=evaluacion;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
