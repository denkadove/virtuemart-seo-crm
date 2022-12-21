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