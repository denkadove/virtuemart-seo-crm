<?php
    namespace Core;

    class baseView{

        public function __construct($model, $controller) {
            $this->model = $model;
            $this->controller = $controller;//
        }

        public function getData(){
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
        }
    }
