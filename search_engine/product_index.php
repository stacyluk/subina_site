<?php
require_once 'search_core.php';
$search_core = new Search_Core();
/*function product_index($db){
    global $search_core, $db;
    // Индексирование описания продукта //
    $description_index = $search_core->make_index( $description );
    $description_index = json_encode( $description_index );
    $product_query = $db->prepare("
        INSERT INTO `catalog` (`id`, `name`,`description`, `index`)
        VALUES (?, ?, ?, ?)"
    );
    if (!$product_query){
        die("Cannot prepare requests!\n");
    }

    if ($product_query->bind_param()){

    }
}*/

function product_index(){
    $db = $this->db;
}