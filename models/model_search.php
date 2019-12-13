<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'model_catalog.php';
class Model_Search extends Model_Catalog
{
    protected $db;

    function __construct()
    {
        //$this->db = DB::getInstance();
    }

    function search()
    {
        require_once __DIR__.DIRECTORY_SEPARATOR.'../search_engine/search_core.php';
        $search_core = new Search_Core();
        $model = new Model_Catalog();
        //$connection = $this->db;
        $query = isset($_GET['query']) ? trim($_GET['query']): false;

        if ($query) {
            // Обработка поискового запроса //
            $query_index = $search_core->make_index($query);


            // Получение данных //
            //$production = $connection->query("SELECT * FROM catalog");
            $production = $model->getAllRows();

            if (!$production) {
                die("Cannot get production info.\n");
            }

            // Search
            foreach ($production as $product) {
                // Распаковка индекса //
                $index = json_decode($product['index']);

                $range = $search_core->search($query_index, $index);


                if ($range > 0) {
                    //$result[$product['id']] = $range;
                    $result[$range] = [
                        $product['id'],
                        $product['name'],
                        $product['price'],
                    ];


                }
            }

            if (isset($result)) {
                // Сортировка по убыванию //
                krsort($result);

                return $result;

            } else {
                return [];
            }
        } else {
            return false;
        }
    }
}