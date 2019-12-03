<div class="news">
<h2>Новости и события</h2>
<table class="table table-striped">
    <?php
    foreach ($data as $row) {
        echo '<tr><td scope="row"><a>'.$row['date'].'</a></td><td><a href="'.$row['link'].'">'.$row['news'].'</a></td></tr>';
    }
    ?>
</table>
</div>