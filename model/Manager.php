<?php

class Manager
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blogforteroche;charset=utf8', 'root', '');
        return $db;
    }
}