<?php

class ProductView extends BaseView
{

    private ProductController $controller;
    private ProductModel $model;

    public function __construct()
    {
        $this->model = new ProductModel();
        $this->controller = new ProductController();
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
            require_once ('templates/default/index.php');
        } else {
            require_once ('templates/default/login.php');
        }
    }
}