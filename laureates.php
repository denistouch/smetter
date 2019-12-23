<?php


class laureates
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

    /**
     * laureates constructor.
     * @param $object
     */
    public function __construct($object)
    {
        $this->id = $object->id;
        $this->firstname = $object->firstname;
        $this->surname = $object->surname;
        $this->born = $object->born;
        $this->died = $object->died;
        $this->bornCountry = $object->bornCountry;
        $this->bornCountryCode = $object->bornCountryCode;
        $this->bornCity = $object->bornCity;
        $this->diedCountry = $object->diedCountry;
        $this->diedCountryCode = $object->diedCountryCode;
        $this->diedCity = $object->diedCity;
        $this->gender = $object->gender;
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

    public function print_info()
    {
        print_t(get_object_vars($this));
    }
}