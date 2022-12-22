<?php
    function show_tile($taskObject, $type=""){
        $baseUrl = $_SERVER["PHP_SELF"]."?shift&id=".$taskObject["id"]."&type=";
        $editUrl = $_SERVER["PHP_SELF"] . "?edit&id=".$taskObject["id"]."&type=". $type;
        $deleteUrl = $_SERVER["PHP_SELF"] . "?delete&id=".$taskObject["id"];
        $o = '<span class="board">'.$taskObject["task"].'
            <hr>
            <span>
              <a href="'.$baseUrl.'backlog">B</a> |
              <a href="'.$baseUrl.'pending">P</a> |
              <a href="'.$baseUrl.'progress">IP</a> |
              <a href="'.$baseUrl.'completed">C</a> |
            </span>
            <a href="'.$editUrl.'">Edit</a> | <a href="'.$deleteUrl.'">Delete</a>
            </span>';
        return $o;
      }

      function get_active_value($type, $content){
        $currentType = isset($_GET['type']) ? $_GET['type']:  null;
        if($currentType == $type){
          return $content;
        }
        return "";
      }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Kaban Board</title>
  <link href="styles.css" rel="stylesheet">
</head>
<body>
<h2 style="text-align: center">Kanban Board</h2>
<div class="bottom" style="margin-bottom: 100px;">
  <form method="post">
    <input type="hidden" value="<?php echo $data['activeId'];?>" name="task"/>
  <div class="board-column">
    <h3>Backlog</h3>
    <div class="board-form">
      <input value="<?php echo get_active_value("backlog", $data['activeTask']);?>" type="text" name="backlog" style="height: 30px; width: 70%" autocomplete="off"/>
      <button type="submit" name="save-backlog">Save</button>
    </div>
    <div class="board-items">
      <?php foreach ($data['backlog_tasks'] as $task):?>
          <?php echo show_tile($task,'backlog');?>
      <?php endforeach;?>
    </div>
  </div>

  <div class="board-column">
    <h3>Pending</h3>
    <div class="board-form">
      <input value="<?php echo get_active_value("pending", $data['activeTask']);?>" type="text" name="pending" style="height: 30px; width: 70%" autocomplete="off"/>
      <button type="submit" name="save-pending">Save</button>
    </div>
    <div class="board-items">
      <?php foreach ($data['pending_tasks'] as $task):?>
        <?php echo show_tile($task,'pending');?>
      <?php endforeach;?>
    </div>
  </div>

  <div class="board-column">
    <h3>In Progress</h3>
    <div class="board-form">
      <input value="<?php echo get_active_value("progress", $data['activeTask']);?>" type="text" name="progress" style="height: 30px; width: 70%" autocomplete="off"/>
      <button type="submit" name="save-progress">Save</button>
    </div>
    <div class="board-items">
      <?php foreach ($data['progress_tasks'] as $task):?>
        <?php echo show_tile($task,'progress');?>
      <?php endforeach;?>
    </div>
  </div>

  <div class="board-column">
    <h3>Completed</h3>
    <div class="board-form">
      <input value="<?php echo get_active_value("completed", $data['activeTask']);?>" type="text" name="completed" style="height: 30px; width: 70%" autocomplete="off"/>
      <button type="submit" name="save-completed">Save</button>
    </div>
    <div class="board-items">
      <?php foreach ($data['completed_tasks'] as $task):?>
        <?php echo show_tile($task,'completed');?>
      <?php endforeach;?>
    </div>
  </div>
  </form>
</div>

</body>
</html>