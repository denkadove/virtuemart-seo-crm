<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once('config.php');
    require_once('core/view.php');
    require_once('core/controller.php');
    require_once('core/model.php');
    //require_once('core/route.php');

    $model = new \Core\baseModel();
    $controller = new \Core\baseController($model);
    $view = new \Core\baseView($model, $controller);


    //$rout = new Core\baseRouter();

    $view->getData();

