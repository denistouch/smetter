<?php
include "Prize.php";

class Laureate
{
    private $id;
    private $firstname;
    private $surname;
    private $born;
    private $died;
    private $bornCountry;
    private $bornCountryCode;
    private $bornCity;
    private $diedCountry;
    private $diedCountryCode;
    private $diedCity;
    private $gender;
    private $prizes;

    /**
     * Laureate constructor.
     * @param $object
     */
    public function __construct($object)
    {
        $this->id = $object->id;
        $this->firstname = addslashes($object->firstname);
        $this->surname = addslashes($object->surname);
        $this->born = dateValid($object->born);
        $this->died = dateValid($object->died);
        $this->bornCountry = addslashes($object->bornCountry);
        $this->bornCountryCode = addslashes($object->bornCountryCode);
        $this->bornCity = addslashes($object->bornCity);
        $this->diedCountry = addslashes($object->diedCountry);
        $this->diedCountryCode = addslashes($object->diedCountryCode);
        $this->diedCity = addslashes($object->diedCity);
        $this->gender = addslashes($object->gender);
        $this->prizes = array();//$object->prizes;
        for ($i = 0;$i < count($object->prizes); $i++) {
            array_push($this->prizes,new Prize($object->prizes[$i],$i,$this->id));
        }
    }
    /**
     * @return int
     */
    public function getPrizes()
    {
        return $this->prizes;
    }

    public function get_values_for_sql()
    {
        return "($this->id,'$this->firstname','$this->surname','$this->born','$this->died','$this->bornCountry','$this->bornCountryCode','$this->bornCity','$this->diedCountry','$this->diedCountryCode','$this->diedCity','$this->gender')";
        //return '('.$this->id.','.''.$this->firstname.','.$this->surname.','.$this->born.','.$this->died.','.$this->bornCountry.','.$this->bornCountryCode.','.$this->bornCity.','.$this->diedCountry.','.$this->diedCountryCode.','.$this->diedCity.','.$this->gender.')';
    }
}