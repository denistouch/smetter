<?php
include "Prizes.php";

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
        $this->born = addslashes($object->born);
        $this->died = addslashes($object->died);
        $this->bornCountry = addslashes($object->bornCountry);
        $this->bornCountryCode = addslashes($object->bornCountryCode);
        $this->bornCity = addslashes($object->bornCity);
        $this->diedCountry = addslashes($object->diedCountry);
        $this->diedCountryCode = addslashes($object->diedCountryCode);
        $this->diedCity = addslashes($object->diedCity);
        $this->gender = addslashes($object->gender);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @return mixed
     */
    public function getBorn()
    {
        return $this->born;
    }

    /**
     * @return mixed
     */
    public function getDied()
    {
        return $this->died;
    }

    /**
     * @return mixed
     */
    public function getBornCountry()
    {
        return $this->bornCountry;
    }

    /**
     * @return mixed
     */
    public function getBornCountryCode()
    {
        return $this->bornCountryCode;
    }

    /**
     * @return mixed
     */
    public function getBornCity()
    {
        return $this->bornCity;
    }

    /**
     * @return mixed
     */
    public function getDiedCountry()
    {
        return $this->diedCountry;
    }

    /**
     * @return mixed
     */
    public function getDiedCountryCode()
    {
        return $this->diedCountryCode;
    }

    /**
     * @return mixed
     */
    public function getDiedCity()
    {
        return $this->diedCity;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @return int
     */
    public function getPrizes()
    {
        return $this->prizes;
    }

    public function print_info()
    {
        print_t(get_object_vars($this));
    }

    public function get_values_for_sql()
    {
        return "($this->id,'$this->firstname','$this->surname','$this->born','$this->died','$this->bornCountry','$this->bornCountryCode','$this->bornCity','$this->diedCountry','$this->diedCountryCode','$this->diedCity','$this->gender')";
        //return '('.$this->id.','.''.$this->firstname.','.$this->surname.','.$this->born.','.$this->died.','.$this->bornCountry.','.$this->bornCountryCode.','.$this->bornCity.','.$this->diedCountry.','.$this->diedCountryCode.','.$this->diedCity.','.$this->gender.')';
    }
}