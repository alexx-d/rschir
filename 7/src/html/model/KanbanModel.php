<?php
    class KanbanModel extends Model{
        public PDO $conn;

        public function __construct()
        {   
            $dsn = "mysql:host=db;port=3306;dbname=wftutorials";
            $user = "user";
            $passwd = "password";
            $this->conn = new PDO($dsn, $user, $passwd);
        }

        function save_task($type, $task, $id){
            if($id){
              $sql = "UPDATE kaban_board SET `task`=? WHERE id=?"; // create sql
              $query = $this->conn->prepare($sql); // prepare
              $query->execute([$task, $id]); // execute
              return $id;
            }else{
              $sql = "INSERT INTO kaban_board(`task`,`type`) VALUES (?,?)"; // create sql
              $query = $this->conn->prepare($sql); // prepare
              $query->execute([$task,$type]); // execute
              return $this->conn->lastInsertId();
            }
          }
          
          function move_task($id, $position){
            $sql = "UPDATE kaban_board SET `type`=? WHERE id=?"; // create sql
            $query = $this->conn->prepare($sql); // prepare
            $query->execute([$position,$id]); // execute
          }
          
          function get_tasks($type){
            $results = [];
            try {
              $query = $this->conn->prepare("SELECT * from kaban_board WHERE type=? order by id desc");
              $query->execute([$type]);
              $results = $query->fetchAll();
            }catch (Exception $e){
          
            }
            return $results;
          }
          
          function get_task($id){
            $results = [];
            try {
              $query = $this->conn->prepare("SELECT * from kaban_board WHERE id=?");
              $query->execute([$id]);
              $results = $query->fetchAll();
              $results = $results[0];
            }catch (Exception $e){
          
            }
            return $results;
          }

        function delete($id){
            try {
                $query = $this->conn->prepare("DELETE from kaban_board WHERE id=?");
                $query->execute([$id]);
                header("Location: ". $_SERVER['PHP_SELF']);
              }catch (Exception $e){
          
              }
        }

    }

?>