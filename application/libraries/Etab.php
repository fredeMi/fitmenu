<?php
require_once "application/libraries/Fitmenu.php";

class Etab extends Fitmenu
{	 	 	 	 	 	 
    private int $id;
    private int $user_id;
    private string $name;
    private string $adress;
    private string $zip_code;
    private string $city;
    private int $phone;
    private string $web_site;
    private int $maintenance;

    public function __construct()
    {
    }

        /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the value of adress
     */ 
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * Set the value of adress
     *
     * @return  self
     */ 
    public function setAdress($adress)
    {
        $this->adress = $adress;
        return $this;
    }

    /**
     * Get the value of zip_code
     */ 
    public function getZip_code()
    {
        return $this->zip_code;
    }

    /**
     * Set the value of zip_code
     *
     * @return  self
     */ 
    public function setZip_code($zip_code)
    {
        $this->zip_code = $zip_code;

        return $this;
    }

    /**
     * Get the value of city
     */ 
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */ 
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     *
     * @return  self
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get the value of web_site
     */ 
    public function getWeb_site()
    {
        return $this->web_site;
    }

    /**
     * Set the value of web_site
     *
     * @return  self
     */ 
    public function setWeb_site($web_site)
    {
        $this->web_site = $web_site;

        return $this;
    }

    /**
     * Get the value of maintenance
     */ 
    public function getMaintenance()
    {
        return $this->maintenance;
    }

    /**
     * Set the value of maintenance
     *
     * @return  self
     */ 
    public function setMaintenance($maintenance)
    {
        $this->maintenance = $maintenance;

        return $this;
    }


    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }
}