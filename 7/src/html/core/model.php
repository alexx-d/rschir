<?php
class Model
{
    public PDO $conn;

    function __construct()
    {
        $dsn = "mysql:host=db;port=3306;dbname=wftutorials";
        $user = "user";
        $passwd = "password";
        $conn = new PDO($dsn, $user, $passwd);
    }

    public function getData()
    {
    }
}