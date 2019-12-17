<?php

class Model_Faq extends Model
{
    public function __construct($select = false)
    {
        parent::__construct($select);
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