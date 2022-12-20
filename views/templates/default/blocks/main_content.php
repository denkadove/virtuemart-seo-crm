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
            <button class="nav-link" id="no-photo-tab" data-bs-toggle="tab" data-bs-target="#no-photo-tab-pane" type="button" role="tab" aria-controls="no-photo-tab-pane" aria-selected="false">Мало фото (<?php echo count($getLowProductMedia) ?>)</button>
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
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="publish-product-tab" tabindex="0">
            <table id="main_table" class="table table-striped table-bordered">
                <tr>
                    <th title="id товара">id</th>
                    <th title="название товара">Название товара</th>
                    <th title="кол-во товара по сайту">Остаток</th>
                    <th title="базовая цена товара">Цена</th>
                    <th title="перезаписать цену товара">over</th>
                    <th title="новая цена товара">Со скидкой</th>
                    <th title="товар опубликован">На сайте</th>
                    <th title="настраиваемое поле 'наличие'">В наличии</th>
                    <th title="настраиваемое поле 'скидка'">Скидка</th>
                    <th title="cтандартное поле 'скидка'">Скидка2</th>
                    <th title="ошибка'">error</th>
                </tr>

                <?php
                foreach ($checkedProductsList as $key => $value) {
                    if ($value["product_canon_category_id"] != '197'){
                        $override = $value["override"] == 1 ? "Да" : "Нет";
                        $published = $value["published"] == 1 ? "Да" : "Нет";
                        $standart_tax = $value["product_discontinued"] == 1 ? "Да" : "Нет";
                        $error_check_style =  'good_value';
                        $error_check_style = $value["hasError"] == 1 ? 'danger_value' : 'good_value';
                        echo '<tr class= '. $error_check_style . '>                    
                                        <td title="id товара">' . $value["virtuemart_product_id"] . '</td>                                        
                                        <td title="название товара">' . $value["product_name"] . '</td>
                                        <td title="кол-во товара по сайту">' . $value["product_in_stock"] . '</td>
                                        <td title="базовая цена товара">' . rtrim(rtrim($value["product_price"],"0"),localeconv()['decimal_point']) . '</td>
                                        <td title="перезаписать цену товара">' . $override  . '</td>
                                        <td title="цена товара со скидкой">' . $value["product_override_price"] . '</td>
                                        <td title="товар опубликован">' . $published . '</td>
                                        <td title="настраиваемое поле наличие">' . $value["availability"] . '</td>
                                        <td title="настраиваемое поле скидка">' . $value["tax"] . '</td>
                                        <td title="стандартное поле скидка">' . $standart_tax . '</td>
                                        <td title="ошибка в проверяемых полях"> - </td>
                                    </tr>';
                    }
                }
                ?>
            </table>
        </div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="unpublish-product-tab" tabindex="0">
            <table id="main_table" class="table table-striped table-bordered">
                <tr>
                    <th title="id товара">id</th>
                    <th title="название товара">Название товара</th>
                    <th title="ошибка'">error</th>
                </tr>

                <?php
                    foreach ($unpublishProductsList as $key => $value) {
                            echo '<tr class= '. $error_check_style . '>
                                           <td title="id товара">' . $value["virtuemart_product_id"] . '</td>                                                
                                           <td title="название товара">' . $value["product_name"] . '</td>                                                
                                           <td title="ошибка в проверяемых полях"> - </td>
                                   </tr>';
                    }
                ?>
            </table>
        </div>
        <div class="tab-pane fade" id="noprice-tab-pane" role="tabpanel" aria-labelledby="noprice-tab" tabindex="0">
            <table id="main_table" class="table table-striped table-bordered">
                <tr>
                    <th title="id товара">id</th>
                    <th title="название товара">Название товара</th>
                    <th title="ошибка'">error</th>
                </tr>

                <?php
                    foreach ($producstWithoutPrice as $key => $value) {
                        echo '<tr class= ' . $error_check_style . '>
                                      <td title="id товара">' . $value["virtuemart_product_id"] . '</td>
                                      <td title="название товара">' . $value["product_name"] . '</td>
                                      <td title="ошибка в проверяемых полях"> - </td>
                                   </tr>';
                    }
                ?>
            </table>
        </div>
        <div class="tab-pane fade" id="no-delivery-price-tab-pane" role="tabpanel" aria-labelledby="no-delyvery-price-tab" tabindex="0">
            <table id="main_table" class="table table-striped table-bordered">
                <tr>
                    <th title="id товара">id</th>
                    <th title="название товара">Название товара</th>
                    <th title="Длина (см)"> Длина (cм) </th>
                    <th title="Ширина (см)"> Ширина (cм) </th>
                    <th title="Высота (см)"> Высота (cм) </th>
                    <th title="Вес (кг)"> Вес (кг) </th>
                    <th title="ошибка">error</th>
                </tr>
                <?php
                    foreach ($productWithoutDeliveryPrice as $key => $value) {
                        echo '<tr>
                                  <td title="id товара">' . $value["virtuemart_product_id"] . '</td>
                                  <td title="название товара">' . $value["product_name"] . '</td>
                                  <td title="Длина">' . $value["product_length"] . '</td>
                                  <td title="Ширина">' . $value["product_width"] . '</td>
                                  <td title="Высота">' . $value["product_height"] . '</td>
                                  <td title="Вес">' . $value["product_weight"] . '</td>
                                  <td title="ошибка в проверяемых полях"> - </td>
                              </tr>';
                    }
                ?>
            </table>
        </div>
        <div class="tab-pane fade" id="no-photo-tab-pane" role="tabpanel" aria-labelledby="no-photo-tab" tabindex="0">
            <table id="main_table" class="table table-striped table-bordered">
                <tr>
                    <th title="id товара">id</th>
                    <th title="название товара">Название товара</th>
                    <th title="кол-во картинок">Кол-во картинок</th>
                </tr>
                <?php
                    foreach ($getLowProductMedia as $key => $value) {
                            echo '<tr>
                                      <td title="id товара">' . $value["virtuemart_product_id"] . '</td>
                                      <td title="название товара">' . $value["product_name"] . '</td>
                                      <td title="кол-во картинок">' . $value["count_media"] . '</td>
                                  </tr>';
                    }
                ?>
            </table>
        </div>
        <div class="tab-pane fade" id="low-desc-tab-pane" role="tabpanel" aria-labelledby="low-desc-tab" tabindex="0">
            <table id="main_table" class="table table-striped table-bordered">
                <tr>
                    <th title="id товара">id</th>
                    <th title="название товара">Название товара</th>
                    <th title="описание">Описание</th>
                </tr>
                <?php
                    foreach ($getLowProductDescription as $key => $value) {
                        echo '<tr>
                                      <td title="id товара">' . $value["virtuemart_product_id"] . '</td>
                                      <td title="название товара">' . $value["product_name"] . '</td>
                                      <td title="кол-во картинок">' . $value["product_desc"] . '</td>
                                  </tr>';
                    }
                ?>
            </table>
        </div>
        <div class="tab-pane fade" id="low-spec-tab-pane" role="tabpanel" aria-labelledby="low-spec-tab" tabindex="0">
            <table id="main_table" class="table table-striped table-bordered">
                <tr>
                    <th title="id товара">id</th>
                    <th title="название товара">Название товара</th>
                    <th title="кол-во характеристик">Характеристик</th>
                </tr>
                <?php
                foreach ($getLowProductSpec as $key => $value) {
                    echo '<tr>
                                      <td title="id товара">' . $value["virtuemart_product_id"] . '</td>
                                      <td title="название товара">' . $value["product_name"] . '</td>
                                      <td title="кол-во характеристики">' . $value["spec"] . '</td>
                                  </tr>';
                }
                ?>
            </table>
        </div>
        <div class="tab-pane fade" id="metatags-tab-pane" role="tabpanel" aria-labelledby="metatags-tab" tabindex="0">
            <table id="main_table" class="table table-striped table-bordered">
                <tr>
                    <th title="id товара">id</th>
                    <th title="название товара">Название товара</th>
                    <th title="title">Тайтл</th>
                    <th title="description">Дескрипшн</th>
                    <th title="описание">Описание</th>
                </tr>
                <?php
                foreach ($getProductMetaTags as $key => $value) {
                    echo '<tr>
                                      <td title="id товара">' . $value["virtuemart_product_id"] . '</td>
                                      <td title="название товара">' . $value["product_name"] . '</td>
                                      <td title="title">' . $value["metadesc"] . '</td>
                                      <td title="description">' . $value["customtitle"] . '</td>
                                      <td title="кол-во картинок">' . $value["product_desc"] . '</td>
                                  </tr>';
                }
                ?>
            </table>
        </div>
    </div>
</div>