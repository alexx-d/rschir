<html lang="ru">
<head>
<title>Hello world page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<h1>Таблица заказов</h1>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Заказ</th>
    </tr>
    <?php
    $mysqli = new mysqli("db", "user", "password", "appDB");
    $result = $mysqli->query("SELECT * FROM orders");
    foreach ($result as $row) {
        echo "<tr><td>{$row['orderID']}</td><td>{$row['name']}</td><td>{$row['order']}</td></tr>";
    }
    ?>
</table>
</body>
</html>