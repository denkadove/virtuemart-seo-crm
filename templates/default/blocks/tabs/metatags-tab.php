<table id="main_table" class="table table-striped table-bordered">
    <tr>
        <th title="id товара">id</th>
        <th title="название товара">Название товара</th>
        <th title="title">Тайтл</th>
        <th title="description">Дескрипшн</th>
        <th title="описание">Описание</th>
    </tr>

    <div class="">
<!--        <form action="" method="post">-->
                <select name="category_choice" class="form-select">
                    <option selected>Выберите категорию товаров</option>
                    <option value="cat1">Категория 1</option>
                    <option value="cat2">Категория 2</option>
                    <option value="cat3">Категория 3</option>
                    <option value="cat3">Категория 4</option>
                    <option value="cat3">Категория 5</option>
                </select>
                <input type="submit" value="Показать" class="btn btn-primary">
<!--        </form>-->
    </div>

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