<div class="catalog">
    <h2>Результаты поиска</h2>
    <div class="row">
        <?php
        foreach ($data as $row) {

            echo "<div class='col-lg-3 col-md-4 col-sm-6 part'>
                  <a class='title' href='/catalog/product/{$row['id']}'>{$row['name']}
                  <img src='{$row['ph_link_1']}'>
                  <div class='count'><a>Macca: {$row['weight']}г</a><a>({$row['quantity']}шт)<br></a></div>
                  <a class='price'>Цена: {$row['price']}руб</a></a></div>";
        }
        ?>
    </div>
</div>