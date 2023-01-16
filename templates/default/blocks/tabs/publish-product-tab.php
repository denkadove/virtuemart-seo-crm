<table id="main_table" class="table table-striped table-bordered">
    <tr>
        <th title="id товара">id</th>
        <th title="название товара">Название товара</th>
        <th title="кол-во товара по сайту">Остаток</th>
        <th title="базовая цена товара">Цена</th>
        <th title="перезаписать цену товара">over</th>
        <th title="новая цена товара">Цена 2</th>
        <th title="товар опубликован">На сайте</th>
        <th title="настраиваемое поле 'наличие'">Наличие</th>
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
                                            <td title="базовая цена товара">' . rtrim(rtrim($value["product_price"] ?? '') ?? '',localeconv()['decimal_point']) . '</td>
                                            <td title="перезаписать цену товара">' . $override  . '</td>
                                            <td title="цена товара со скидкой">' . rtrim(rtrim($value["product_override_price"] ?? '') ?? '',localeconv()['decimal_point']) . '</td>
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
