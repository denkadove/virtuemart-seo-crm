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