<?php
class Model
{
    public PDO $conn;

    function __construct()
    {
        $dsn = "mysql:host=mysql;port=3306;dbname=wftutorials";
        $user = "root";
        $passwd = "secret";
        $conn = new PDO($dsn, $user, $passwd);
    }

    public function getData()
    {
    }
}