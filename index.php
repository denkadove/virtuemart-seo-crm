<?php

    use Core\baseController;
    use Core\baseModel;
    use Core\baseView;
    use Core\baseRouter;

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once('config.php');
    require_once('core/route.php');
    require_once('core/view.php');
    require_once('core/controller.php');
    require_once('core/model.php');

    $model = new baseModel();
    $controller = new baseController();
    $view = new baseView();
    $rout = new baseRouter();

    $view->getData();

