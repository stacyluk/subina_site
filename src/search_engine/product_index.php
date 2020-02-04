<?php
namespace src\search_engine;

use database\DB;

function product_index()
{
    $db = DB::getInstance();
    $search_core = new Search_Core();
    /*    $stmt = $db->query("
            SELECT id, description
            FROM catalog ");
        if ( !$stmt ) {
            die( "Cannot get production info.\n" );
        }
        $rows = $stmt->fetchAll();*/
    $sql = 'SELECT id, description FROM catalog';

    foreach ($db->query($sql) as $row) {
        $id = $row['id'];
        $description_index = $search_core->make_index($row['description']);
        $description_index = json_encode($description_index);
        $description_query = $db->prepare("UPDATE catalog SET `index` = :index WHERE id = :id");
        if (!$description_query) {
            die("Cannot prepare requests!\n");
        }
        $description_query->execute(array(':index' => $description_index, ':id' => $id));

    }

}

product_index();