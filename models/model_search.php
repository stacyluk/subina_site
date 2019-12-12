<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'model_catalog.php';
class Model_Search extends Model_Catalog
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
            // TODO: вместо селекта feathAll() из базовой модели
            $production = $connection->query("SELECT * FROM catalog");

            if (!$production) {
                die("Cannot get production info.\n");
            }

            // Search
            foreach ($production->fetchAll() as $product) {
                // Распаковка индекса //
                $index = json_decode($product['index']);

                $range = $search_core->search($query_index, $index);
                // TODO: Когда приходит запрос, создаешь модель. Можно получить все продукты с помошь метода fetchAll() из базовой модели. Пробегаем по данным берём Index Description ищем range  и в результат складываем целиком строчки из featchAll()  которые мне подошли. Создаешь ещё один массив, который формируешь и складываешь в $result складываешь сразу целую строку, которую  featchAll() вернул если range>0.
                if ($range > 0) {
                    $result[$product['id']] = $range;
/*                    $result = [array(
                        $product['id'] => $range,
                        $product['name'],
                        $product['ph_link_1'],
                        $product['weight'],
                        $product['quantity'],
                        $product['price'])
                    ];*/
                }
            }

            if (isset($result)) {
                // Сортировка по убыванию //
                arsort($result);

                return $result;

            } else {
                return [];
            }
        } else {
            return false;
        }
    }

/*    // получить запись по id
    function getRowById($id)
    {
        try {
            $db = $this->db;
            if (!$stmt = $db->query("SELECT * from $this->table WHERE id = $id")) {
                die(var_export($db->errorinfo(), true));
            }

            $row = $stmt->fetch();
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        return $row;
    }*/

}