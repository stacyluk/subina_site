<div class="product">
    <?php
    if ($data) {
        echo '<h2>'.$data['name'].'</h2>';
        echo "<div class='row'><div class='col-lg-8 col-md-8 col-sm-10'>
          <a class='description'>{$data['description']}<br></a><div class='crit'><a class='count'><b>Масса: </b>{$data['weight']}г(~{$data['quantity']}шт)<br></a>
          <a class='price'><b>Цена: </b>{$data['price']}руб</a></div></div>
          <div class='col-lg-4 col-md-4 col-sm-2'><img src='{$data['ph_link_1']}'></div></div>";
    }
    ?>
</div>
