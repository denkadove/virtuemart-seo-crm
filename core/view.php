<?php
    namespace Core;

    class baseView{

        private baseController $controller;
        private baseModel $model;

        public function __construct()
        {
            $this->model = new namespace\baseModel();
            $this->controller = new namespace\baseController();
        }

        public function getData()
        {   //TODO rewrite

            $is_auth = $this->model->isAuth();
            if ($is_auth) {
                $publishProductsList = $this->model->getPublishProductsList();
                $checkedProductsList =  $this->controller->getCheckedProductList($publishProductsList);
                $unpublishProductsList = $this->model->getUnpublishProductList();
                $producstWithoutPrice = $this->model->getProductsWithoutPrice();
                $productWithoutDeliveryPrice = $this->model->getProductWithoutDeliveryPrice();
                $getLowProductMedia = $this->model->getLowProductMedia();
                $getLowProductDescription = $this->model->getLowProductDescription();
                $getLowProductSpec = $this->model->getLowProductSpec();
                $getProductMetaTags = $this->model->getProductMetaTags();
                require_once('views/templates/default/index.php');
            } else {
                require_once 'views/templates/default/login.php';
            }
        }
    }
