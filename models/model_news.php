<?php
    namespace model;
    use core\Model;

class Model_News extends Model
{
    public function __construct($select = false)
    {
        parent::__construct('news', $select);
    }

    public function fieldsTable()
    {
        return [
            'id' => 'Id',
            'date' => 'Date',
            'news' => 'News',
            'link' => 'Link',
            'image_link' => 'Image'
        ];
    }
}