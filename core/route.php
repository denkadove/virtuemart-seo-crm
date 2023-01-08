<?php

    class BaseRouter
    {

        public function __construct(){

        }

        public function getRoute(): array{
            $rout = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));;
            return $rout;
        }

    }
    