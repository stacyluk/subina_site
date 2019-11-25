<?php


class Model_News extends Model
{
    public function __construct($select = false)
    {
        parent::__construct($select);
    }

    public function fieldsTable() {
        return [
            'news_id' => 'Id',
            'date' => 'Date',
            'news' => 'News',
            'description' => 'Description'
        ];
    }
}