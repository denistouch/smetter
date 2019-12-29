<?php


class Affiliation
{
    private $name;
    private $city;
    private $country;
    private $laureate_id;
    private $laureate_prize_number;

    public function __construct($object,$laureate_id,$laureate_prize_number)
    {
        $this->name = addslashes($object->name);
        $this->city = addslashes($object->city);
        $this->country = addslashes($object->country);
        $this->laureate_id = $laureate_id;
        $this->laureate_prize_number = $laureate_prize_number;
    }

    public function get_values_for_sql()
    {
        return "(NULL,'$this->name','$this->city','$this->country',$this->laureate_id,$this->laureate_prize_number,0)";
    }
}