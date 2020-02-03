<?php
    namespace model;
    use core\Model;

class Model_Catalog extends Model
{
    public $seeds_id;
    public $name;
    public $description;
    public $weight;
    public $quantity;
    public $price;
    public $type_id;


    public function __construct($select = false)
    {
        parent::__construct('catalog', $select);
    }

    public function fieldsTable()
    {
        return [
            'id' => 'Id',
            'name' => 'Name',
            'description' => 'Description',
            'weight' => 'Weight',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'ph_link_1' => 'Photo link 1',
            'ph_link_2' => 'Photo Link 2',
            'ph_link_3' => 'Photo link 3',
            'type_id' => 'Type Id',
            'index' => 'Index'
        ];
    }

}