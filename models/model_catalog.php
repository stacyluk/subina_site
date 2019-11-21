<?php


class Model_Catalog extends Model
{
    public $type_id;
    public $name;

    public function fieldsTable(){
        return array(
            'type_id' => 'Type',
            'name' => 'Name'
        );
    }
}