<html lang="en">
<head>
    <title>Hello page</title>
    <link rel="stylesheet" href="style.css" type="text/css"/>
</head>
<body>
<h1>Управление заказами</h1>
<h2>Добавить заказ</h2>
<form action="add.php" method="get">
    <div class="flex-row logo">
    </div>
    <div class="flex-row">
      <input id="username" class='input' placeholder='Имя' type='text' name="name" required>
    </div>
    <div class="flex-row">
      <input id="ord" class='input' placeholder='Заказ' type='text' name="ord" required>
    </div>
    <input class='submit' type='submit' value='Добавить'>
  </form>
  <h2>Удалить заказ</h2>
  <form action="del.php" method="get">
    <div class="flex-row logo">
    </div>
    <div class="flex-row">
      <input id="username" class='input' placeholder='Айди))' type='text' name="id" required>
    </div>
    <input class='submit' type='submit' value='Удалить'>
  </form>

</body>
</html>