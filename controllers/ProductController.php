<?php

class ProductController extends BaseController
{

    private array $productsList;
    private ProductModel $model;

    public function  __construct(){
        $this->model = new ProductModel();
        $this->productsList = self::getCheckedProductList($this->model->getPublishProductsList());
    }

    public function getCheckedProductList(array $productsList): array
    {
        $checkedProductsList = [];
        foreach ($productsList as $key => $product){
            $product["hasError"] = !self::check_product_errors($product);
            $checkedProductsList[$key] = $product;
        }
        return $checkedProductsList;
    }

    public function check_product_errors(array $productsList) {
        //TODO     REWRITE IT
        if ($productsList["published"] == '1') {
            if ($productsList["product_price"] <= $productsList["product_override_price"]) {
                return false;
            }
            if (($productsList["override"] == 0) and
                ($productsList["product_override_price"] > 0)){
                return false;
            }
            if ($productsList["product_price"] == 0) { return false; }
            if (($productsList["override"]) == 1 and ($productsList["product_discontinued"] == 0) and ($productsList["price_quantity_start"] == 0)) { return false; }
            if (($productsList["override"]) == 0 and ($productsList["product_discontinued"] == 1) and ($productsList["price_quantity_start"] == 0)) { return false; }
            if (($productsList["override"]) == 1 and ($productsList["tax"] == "Нет") and ($productsList["price_quantity_start"] == 0)) { return false; }
            if (($productsList["override"]) == 0 and ($productsList["tax"] == "Да") and ($productsList["price_quantity_start"] == 0)) { return false; }
            if (($productsList["product_in_stock"] >= 0 and $productsList["availability"] == "Нет") or ($productsList["product_in_stock"] < 0 and $productsList["availability"] == "Да")) {}
            else { return true; }
        } else {
            return false;
        }
    }


}