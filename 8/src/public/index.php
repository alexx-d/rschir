<?php
    require_once 'core/model.php';
    require_once 'core/view.php';
    require_once 'core/controller.php';
    require_once 'core/route.php';
    include_once 'controllers/MainController.php';
    include_once 'model/KanbanModel.php';
    #include_once 'view/MainView.php';
    $controller = new MainController();
    $controller->index();
?>