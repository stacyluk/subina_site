<?php


class Model_Search
{
    protected $db;

    function __construct()
    {
        $this->db = DB::getInstance();
    }

    function search()
    {
        require_once __DIR__.DIRECTORY_SEPARATOR.'../search_engine/search_core.php';
        $search_core = new Search_Core();
        $connection = $this->db;
        $query = isset($_GET['query']) ? trim($_GET['query']): false;

        if ($query) {
            // Обработка поискового запроса //
            $query_index = $search_core->make_index($query);


            // Получение данных //
            $production = $connection->query("SELECT id, name, description, index FROM catalog");

            if (!$production) {
                die("Cannot get production info.\n");
            }

            // Выполнение поиска //
            while ($product = $production->fetchAll()) {
                // Распаковка индекса //
                $description = json_decode($product['description']);
                $index = json_decode($product['index']);

                $range = $search_core->search($query_index, $description);
                $range += $search_core->search($query_index, $index);

                if ($range > 0) {
                    $result[$product['id']] = $range;
                }
            }

            if (isset($result)) {
                // Сортировка по убыванию //
                arsort($result);

                // Вывод результатов //
                $i = 1;

                foreach ($result as $id => $range) {
                    printf(
                        "#%d. Found product with id %d and range %d.\n",
                        $i++,
                        $id,
                        $range
                    );
                }
            } else {
                echo("Sorry, no results found.\n");
            }
        } else {
            echo( "Query cannot be empty. Try again.\n" );
        }
    }
}