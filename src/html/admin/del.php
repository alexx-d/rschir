<?php
    $id = $_GET['id'];
    $id = (int) $id;
    $mysqli = new mysqli("db", "user", "password", "appDB");
    $result = $mysqli->query("DELETE FROM orders WHERE orderID=$id");
    header("Location: http://localhost:8080/index.php");
    exit();
