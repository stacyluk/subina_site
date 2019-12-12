<div class="search">
    <h2>Результаты поиска</h2>
    <div class="row">
        <?php
        if($data){
            $i = 0;
            foreach ($data as $id => $range) {
                echo "<div class='col-sm-12'><a class='title' href='/catalog/product/$id'>Мы что-то нашли...<br></a></div>";
            }
        } else {
            echo "<div class='col-sm-12'><h5 class='title'>К сожалению, по вашему запросу ничего не нашлось.<br></h5>
                    <a>Проверь написание или используй менее специфичные термины для поиска.</a></div>";
        }
        ?>
    </div>
</div>