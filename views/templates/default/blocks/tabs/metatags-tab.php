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