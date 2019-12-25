<?php


class Prize
{
    private $year;
    private $category;
    private $share;
    private $motivation;
    private $prize_number;
    private $laureate_id;

    public function __construct($object,$prize_number,$laureate_id)
    {
        $this->year = $object->year;
        $this->category = addslashes($object->category);
        $this->share = $object->share;
        $this->motivation = addslashes($object->motivation);
        $this->prize_number = $prize_number;
        $this->laureate_id = $laureate_id;
    }
}