<?php

    declare(strict_types=1);

    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    require_once ('config.php');
    require_once ('core/route.php');

    require_once ('core/view.php');
    require_once ('core/controller.php');
    require_once ('core/model.php');

    require_once ('views/ProductView.php');
    require_once ('controllers/ProductController.php');
    require_once ('models/ProductModel.php');

    $config = (array) new CrmConfig;
    $rout = new BaseRouter();

    $model = new ProductModel();
    $controller = new ProductController();
    $view = new ProductView();



    if (($rout->getRoute()[1] === 'products') or ($rout->getRoute()[1] === '') or ($rout->getRoute()[1] === 'index.php')){
        session_start();
        $view->getData();
    } else {
        header("HTTP/1.1 404 Not Found");
        require_once('templates/default/404.php');
    }
