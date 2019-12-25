<?php
include 'Affiliation.php';

class Prize
{
    private $year;
    private $category;
    private $share;
    private $motivation;
    private $laureate_id;
    private $laureate_prize_number;
    private $affiliations;

    public function __construct($object,$laureate_prize_number,$laureate_id)
    {
        $this->year = $object->year;
        $this->category = addslashes($object->category);
        $this->share = $object->share;
        $this->motivation = addslashes($object->motivation);
        $this->laureate_prize_number = $laureate_prize_number;
        $this->laureate_id = $laureate_id;
        $this->affiliations = array();
        for ($i = 0;$i < count($object->affiliations); $i++) {
            if ($object->affiliations[$i]->name)
                array_push($this->affiliations,new Affiliation($object->affiliations[$i],$this->laureate_id,$this->laureate_prize_number));
        }
    }

    /**
     * @return array
     */
    public function getAffiliations()
    {
        return $this->affiliations;
    }

    public function get_values_for_sql()
    {
        return "(NULL,'$this->year','$this->category',$this->share,'$this->motivation',$this->laureate_id,$this->laureate_prize_number)";
    }
}