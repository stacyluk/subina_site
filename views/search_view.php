<div class="search">
    <h2>Результаты поиска</h2>
    <?php
    if($data){
        $i = 0;
        foreach ($data as $id => $range) {
            printf(
                "#%d. Found product with id %d and range %d.<br>",
                $i++,
                $id,
                $range
            );
        }    } else {
        echo '<h3>Fail</h3>';
    }
    ?>
</div>