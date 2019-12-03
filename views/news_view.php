<h2>Новости и события</h2>
<table class="table">
    <?php
    foreach ($data as $row) {
        echo '<tr><td><a>'.$row['date'].'</a></td><td><a href="'.$row['link'].'">'.$row['news'].'</a></td></tr>';
    }
    ?>
</table>