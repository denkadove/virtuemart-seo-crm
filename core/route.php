<?php

    namespace Core;

    class baseRouter {

        public function __construct(){

        }

        public function getRoute(){
            $rout = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));;
            return $rout;
        }



    }
    