<?php
    $ord = $_GET['ord'];
    $name= $_GET['name'];
    $mysqli = new mysqli("db", "user", "password", "appDB");
    $result = $mysqli->query("INSERT INTO orders VALUE (NULL, '$name', '$ord')");
    header("Location: http://localhost:8080/index.php");
    exit();
?>