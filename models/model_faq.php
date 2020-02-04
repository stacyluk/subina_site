<?php

namespace models;

use core\Model;

class Model_Faq extends Model
{
    public function __construct($select = false)
    {
        parent::__construct('faq', $select);
    }

    public function fieldsTable()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'question' => 'Question',
            'q_date' => 'Question date',
            'answer' => 'Answer',
            'a_date' => 'Answer date',
        ];
    }
}