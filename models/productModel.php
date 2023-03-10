<?php

    class ProductModel extends baseModel
    {
        public function __construct()
        {

        }

        public function  getDBconnect(): array
        {
            global $config;
            $db['availability_custom_field_id'] = $config["availability_custom_field_id"];
            $db['tax_custom_field_id'] = $config["tax_custom_field_id"];
            $db['user'] = $config["user"];
            $db['pass'] = $config["pass"];
            $db['host'] = $config["host"];
            $db['dbname'] = $config["dbname"];
            $db['table_prefix']  = $config["table_prefix"];
            return $db;
        }

        public  function getProductList(): array
        {
            $db = self::getDBconnect();
            $query = "SELECT a.`virtuemart_product_id`, b.`product_name`
                      FROM `" . $db['table_prefix'] . "virtuemart_products` a
                      LEFT JOIN  `" . $db['table_prefix'] . "virtuemart_products_ru_ru` b
                      ON a.`virtuemart_product_id` = b.`virtuemart_product_id`                                         
                      WHERE a.`published` = 1 
                      ";
            return $this->getDataRequest($query);
        }

        public function getPublishProductsList(): array
        {
            $db = self::getDBconnect();
            $query = "SELECT b.`product_name`, a.`virtuemart_product_id`, a.`product_in_stock`, a.`published`, a.`product_canon_category_id`, 
                    a.`product_discontinued`, c.`product_price`, c.`override`, c.`product_override_price`, c.`price_quantity_start`, d.`availability`, e.`tax`
              FROM `" . $db['table_prefix'] . "virtuemart_products` a
              LEFT JOIN  `" . $db['table_prefix'] . "virtuemart_products_ru_ru` b              
              ON a.`virtuemart_product_id` = b.`virtuemart_product_id`
              LEFT JOIN  `" . $db['table_prefix'] . "virtuemart_product_prices` c
              ON  a.`virtuemart_product_id` = c.`virtuemart_product_id`
              LEFT JOIN  (select `virtuemart_product_id`,`customfield_value` as `availability` from  `" . $db['table_prefix'] . "virtuemart_product_customfields` where `virtuemart_custom_id`='" . $db['availability_custom_field_id'] . "') d
              ON  a.`virtuemart_product_id` = d.`virtuemart_product_id`
              LEFT JOIN  (select `virtuemart_product_id`,`customfield_value` as `tax` from  `" . $db['table_prefix'] . "virtuemart_product_customfields` where `virtuemart_custom_id`='" . $db['tax_custom_field_id'] . "') e
              ON  a.`virtuemart_product_id` = e.`virtuemart_product_id` 
              WHERE a.`published` = 1 and c.`product_price` > 0
              ";
            return $this->getDataRequest($query);
        }

        public function getUnpublishProductList(): array
        {
            $db = self::getDBconnect();
            $query = "SELECT b.`product_name`, a.`virtuemart_product_id`, a.`published`, a.`product_canon_category_id`                             
                      FROM `" . $db['table_prefix'] . "virtuemart_products` a
                      LEFT JOIN  `" . $db['table_prefix'] . "virtuemart_products_ru_ru` b              
                      ON a.`virtuemart_product_id` = b.`virtuemart_product_id`
                      WHERE a.`published` = 0 and a.`product_canon_category_id` != '197'
                      ";
            return $this->getDataRequest($query);
        }

        public function getProductsWithoutPrice(): array
        {
            $db = self::getDBconnect();
            $query = "SELECT b.`product_name`, a.`virtuemart_product_id`, c.`product_price`
                      FROM `" . $db['table_prefix'] . "virtuemart_products` a
                      LEFT JOIN  `" . $db['table_prefix'] . "virtuemart_products_ru_ru` b
                      ON a.`virtuemart_product_id` = b.`virtuemart_product_id` 
                      LEFT JOIN  `" . $db['table_prefix'] . "virtuemart_product_prices` c
                      ON  a.`virtuemart_product_id` = c.`virtuemart_product_id`                       
                      WHERE a.`published` = 1 and a.`product_canon_category_id` != '197' and c.`product_price` = '0'
                      ";
            return $this->getDataRequest($query);
        }

        public function getProductWithoutDeliveryPrice(): array
        {
            $db = self::getDBconnect();
            $query = "SELECT b.`product_name`, a.`virtuemart_product_id`, a.`product_length`, a.`product_width`, a.`product_height`, a.`product_weight`
                      FROM `" . $db['table_prefix'] . "virtuemart_products` a
                      LEFT JOIN  `" . $db['table_prefix'] . "virtuemart_products_ru_ru` b
                      ON a.`virtuemart_product_id` = b.`virtuemart_product_id`                                         
                      WHERE a.`published` = 1 and (a.`product_length` is NULL or a.`product_weight` is NULL or a.`product_width` is NULL or a.`product_height` is NULL)
                      ";
            return $this->getDataRequest($query);
        }

        public function getLowProductMedia(): array
        {
            $db = self::getDBconnect();
            //TODO rewrite this!!!
            $query = "SELECT `virtuemart_product_id`, `product_name`, `count_media`, `published` 
                        FROM (SELECT `virtuemart_product_id`, COUNT(*) as count_media from `" . $db['table_prefix'] . "virtuemart_product_medias`
                        GROUP BY `virtuemart_product_id`) as t1 
                        LEFT JOIN `" . $db['table_prefix'] . "virtuemart_products_ru_ru` using (`virtuemart_product_id`)
                        LEFT JOIN `" . $db['table_prefix'] . "virtuemart_products` using (`virtuemart_product_id`) 
                        WHERE `count_media` < 3 AND `virtuemart_product_id` <> 0 AND `published` = 1;";
            $result = $this->getDataRequest($query);
            $lowMediaProductsList = [];
            foreach ($result as $key =>  $value) {
                $lowMediaProductsList[$key]['virtuemart_product_id'] = $value["virtuemart_product_id"];
                $lowMediaProductsList[$key]['product_name'] = $value['product_name'];
                $lowMediaProductsList[$key]['count_media'] = $value['count_media'];
            }
            return $lowMediaProductsList;
        }

        public function getLowProductDescription(): array
        {
            $db = self::getDBconnect();
            $query = "SELECT a.`virtuemart_product_id`, b.`product_name`,  b.`product_desc`
                      FROM `" . $db['table_prefix'] . "virtuemart_products` a
                      LEFT JOIN  `" . $db['table_prefix'] . "virtuemart_products_ru_ru` b
                      ON a.`virtuemart_product_id` = b.`virtuemart_product_id`                                         
                      WHERE a.`published` = 1 and LENGTH(b.`product_desc`) < 400
                      ";
            return $this->getDataRequest($query);
        }

        public function getProductMetaTags(): array
        {
            global $config;
            $db = self::getDBconnect();
            $query = "SELECT a.`virtuemart_product_id`, b.`product_name`,  b.`metadesc`, b.`customtitle`, b.`product_desc`
                      FROM `" . $db['table_prefix'] . "virtuemart_products` a
                      LEFT JOIN  `" . $db['table_prefix'] . "virtuemart_products_ru_ru` b
                      ON a.`virtuemart_product_id` = b.`virtuemart_product_id`                                         
                      WHERE a.`published` = 1 and a.`virtuemart_product_id` IN (". $config['metatag_product_list'] ."); 
                      ";
            return $this->getDataRequest($query);
        }

        public function getLowProductSpec(): array
        {
            $db = self::getDBconnect();
            $query = "SELECT a.`virtuemart_product_id`, b.`product_name`, c.`spec`
                          FROM (SELECT `virtuemart_product_id` FROM `" . $db['table_prefix'] . "virtuemart_products` WHERE `published` = '1') a                                                 
                          LEFT JOIN  (SELECT `virtuemart_product_id`, `product_name` FROM `" . $db['table_prefix'] . "virtuemart_products_ru_ru`) b
                          ON a.`virtuemart_product_id` = b.`virtuemart_product_id`
                          LEFT JOIN  (SELECT `virtuemart_product_id`, COUNT(`virtuemart_custom_id`) as spec FROM `" . $db['table_prefix'] . "virtuemart_product_customfields` GROUP BY `virtuemart_product_id`) c
                          ON a.`virtuemart_product_id` = c.`virtuemart_product_id`
                          WHERE c.`spec` < '5'                                           
                      ";
            return $this->getDataRequest($query);
        }

        public function getDataRequest(string $query): array
        {
            $db = self:: getDBconnect();
            try {
                $dbh = new \PDO('mysql:host='. $db['host'] .';dbname=' . $db['dbname'], $db['user'], $db['pass']);
                $list = [];
                $products = $dbh->query($query);
                foreach($products as $key => $row) {
                    $list[$key] = $row;
                }
                $dbh = null;
                return $list;
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }

        public function isAuth():bool {
            //TODO rewrite
            define('ADMIN', 'admin');
            if (isset($_SESSION['is_auth'])) {
                if ($_SESSION['is_auth'] === true) {
                    return true;
                } else {
                    return false;
                }
            } else {
                $_SESSION['is_auth'] = false;
                return false;
            }
        }
    }