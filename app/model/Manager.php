<?php

class Manager
{
    protected function databaseConnection()
    {
        $db = new PDO('mysql:host=localhost;dbname=app;charset=utf8', 'root', '');
        return $db;
    }
}