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