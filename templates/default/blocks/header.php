<!doctype html>
<html lang="ru">
    <head>
        <!-- Required meta tags -->
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="yandex" content="noindex, nofollow" />
        <link rel="shortcut icon" href="templates/default/assets/images/favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="templates/default/assets/css/main.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> 
        <title>CRM</title>
    </head>
    <body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                CRM
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-secondary">Сайт</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Товары</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">КПП</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Заказы</a></li>
                <li><a href="#" class="nav-link px-2 link-dark">Характеристики</a></li>

            </ul>

            <div class="col-md-3 text-end">
                <button type="button" class="btn btn-outline-primary me-2">
                    <a href="#" class="link">Админка</a>
                </button>
                <button type="button" class="btn btn-outline-primary me-2">
                    <a href="index.php?auth=logout" class="link">Выйти</a>
                </button>
            </div>
        </header>
    </div>

    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="publish-product-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Товар на сайте (<?php echo count($checkedProductsList) ?>)</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="unpublish-product-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Неопубликовано (<?php echo count($unpublishProductsList) ?>)</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#noprice-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Товар без цен (<?php echo count($producstWithoutPrice) ?>)</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="no-delivery-price-tab" data-bs-toggle="tab" data-bs-target="#no-delivery-price-tab-pane" type="button" role="tab" aria-controls="no-delivery-price-tab-pane" aria-selected="false">Без цен доставки (<?php echo count($productWithoutDeliveryPrice) ?>)</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="no-photo-tab" data-bs-toggle="tab" data-bs-target="#no-photo-tab-pane"
                        type="button" role="tab" aria-controls="no-photo-tab-pane" aria-selected="false">Мало фото
                    (<?php echo count($getLowProductMedia) ?>)</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="low-desc-tab" data-bs-toggle="tab" data-bs-target="#low-desc-tab-pane" type="button" role="tab" aria-controls="low-desc-tab-pane" aria-selected="false">Короткое описание (<?php echo count($getLowProductDescription) ?>)</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="low-spec-tab" data-bs-toggle="tab" data-bs-target="#low-spec-tab-pane" type="button" role="tab" aria-controls="low-spec-tab-pane" aria-selected="false">Мало характеристик (<?php echo count($getLowProductSpec) ?>)</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="metatags-tab" data-bs-toggle="tab" data-bs-target="#metatags-tab-pane" type="button" role="tab" aria-controls="metatags" aria-selected="false">Метатеги (<?php echo count($getProductMetaTags) ?>)</button>
            </li>
        </ul>
