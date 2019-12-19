<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'model_catalog.php';

class Model_Search extends Model_Catalog
{
    protected $db;

    public function __construct($select = false)
    {
        parent::__construct($select);
    }

    function search()
    {
        require_once __DIR__.DIRECTORY_SEPARATOR.'../search_engine/search_core.php';
        $search_core = new Search_Core();
        //$connection = $this->db;
        $query = isset($_GET['query']) ? trim($_GET['query']) : false;

        if ($query) {
            // Обработка поискового запроса //
            $query_index = $search_core->make_index($query);


            // Получение данных //
            //$production = $connection->query("SELECT * FROM catalog");
            $production = $this->getAllRows();

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
                    $result[] = [
                        'id' => $product['id'],
                        'name' => $product['name'],
                        'weight' => $product['weight'],
                        'quantity' => $product['quantity'],
                        'price' => $product['price'],
                        'ph_link_1' => $product['ph_link_1'],
                        'range' => $range,
                    ];
                }
            }

            if (isset($result)) {
                // Сортировка по убыванию //
                // arsort($result[]['range']);

                return $result;

            } else {
                return [];
            }
        } else {
            return false;
        }
    }
}