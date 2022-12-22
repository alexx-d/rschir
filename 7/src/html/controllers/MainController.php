<?php
    class MainController extends Controller {

        private $kanbanModel;

        function __construct()
        {
            parent::__construct();
            $this->kanbanModel = new KanbanModel();
        }

        function index()
        {   
    
            $data = array();
            $data['backlog_tasks'] = $this->kanbanModel->get_tasks('backlog');
            $data['pending_tasks'] = $this->kanbanModel->get_tasks('pending');
            $data['progress_tasks'] = $this->kanbanModel->get_tasks('progress');
            $data['completed_tasks'] = $this->kanbanModel->get_tasks('completed');

            $data['activeId'] = "";
            $data['activeTask']= "";

            if(isset($_GET['shift'])){
                $id = isset($_GET['id']) ? $_GET['id'] : null;
                $type = isset($_GET['type']) ? $_GET['type'] : null;
                if($id){
                    $this->kanbanModel->move_task($id, $type);
                    header("Location: ". $_SERVER['PHP_SELF']);
                    exit();
                }else{
                  // redirect take no action.
                  header("Location: ". $_SERVER['PHP_SELF']);
                }
              }
              
              if(isset($_GET['edit'])){
                $id = isset($_GET['id']) ? $_GET['id'] : null;
                $data['activeId'] = $id;
                $type = isset($_GET['type']) ? $_GET['type'] : null;
                if($id){
                  $taskObject = $this->kanbanModel->get_task($id);
                  $data['activeTask'] = $taskObject["task"];
                }
              }
              
              if(isset($_GET['delete'])){
                $id = isset($_GET['id']) ? $_GET['id'] : null;
                if($id){
                    $this->kanbanModel->delete($id);
                }
              }
              
              if($_SERVER["REQUEST_METHOD"] == "POST"){
              
                $backlog = "";
                $pending = "";
                $progress = "";
                $completed = "";
                $taskId = isset($_POST['task']) ? $_POST['task'] : null;
              
                if(isset($_POST['save-backlog'])){
                  $backlog = isset($_POST['backlog']) ? $_POST['backlog'] : null;
                  $this->kanbanModel->save_task('backlog', $backlog, $data['activeId']);
              
                }else if(isset($_POST['save-pending'])){
                  $pending = isset($_POST['pending']) ? $_POST['pending'] : null;
                  $this->kanbanModel->save_task('pending', $pending, $data['activeId']);

                }else if(isset($_POST['save-progress'])){
                  $progress = isset($_POST['progress']) ? $_POST['progress'] : null;
                  $this->kanbanModel->save_task('progress', $progress, $data['activeId']);
                  
                }else if(isset($_POST['save-completed'])){
                  $completed = isset($_POST['completed']) ? $_POST['completed'] : null;
                  $this->kanbanModel->save_task('completed', $completed, $data['activeId']);
                }
                if($data['activeId']){
                  header("Location: ". $_SERVER['PHP_SELF']);
                }

                $data['backlog_tasks'] = $this->kanbanModel->get_tasks('backlog');
                $data['pending_tasks'] = $this->kanbanModel->get_tasks('pending');
                $data['progress_tasks'] = $this->kanbanModel->get_tasks('progress');
                $data['completed_tasks'] = $this->kanbanModel->get_tasks('completed');
                
              
            }

            $this->view->generate("MainView.php", $data);
        }
        
    }
?>