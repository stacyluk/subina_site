<?php
if ($data) {
    echo '<h2>'.$data['name'].'</h2>';
    echo '<a>'.$data['description'].'</a>';
    echo "<div>
        <a style='float: left; margin-top: 130px; margin-left: 10px'>{$data['weight']}кг(~{$data['quantity']}шт)<br><b>Цена: </b>{$data['price']}руб</a>
        <img src='{$data['ph_link_1']}' style='width: 20%; height: 20%; float: right; margin: 7px 0 7px 7px'>
    </div>";
}
?>

