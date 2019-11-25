<?php


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
        parent::__construct($select);
    }

    public function fieldsTable() {
        return [
            'seeds_id' => 'Id',
            'name' => 'Name',
            'description' => 'Description'
        ];
    }

}