<h2>Каталог<h1>
        <table style="font-size: 10px; font-weight: lighter">
            <?php
            foreach ($data as $row){

                echo '<tr><td><a href="/catalog/product">'.$row['name'].'</a></td><td><a>Масса: '.$row['weight'].'г</a></td><td><a>(~'.$row['quantity'].'шт)</a></td><td><a>Цена: '.$row['price'].'</a></td></tr>';
            }
            ?>
        </table>
