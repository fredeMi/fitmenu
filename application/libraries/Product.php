<?php
require_once "application/libraries/Fitmenu.php";

class Product extends Fitmenu
{	 	 	 	 	 	 
    private int $id = 0;
    private int $cat_id;
    private string $name = '';
    private string $description = '';
    private float $price = 0;
    private int $highlight = 0;
    private int $sold_out = 0;
    private int $rank = 0;
    private string $image = '';

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
     * Get the value of cat_id
     */ 
    public function getCat_id()
    {
        return $this->cat_id;
    }

    /**
     * Set the value of cat_id
     *
     * @return  self
     */ 
    public function setCat_id($cat_id)
    {
        $this->cat_id = $cat_id;

        return $this;
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
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set the value of price
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get the value of highlight
     */ 
    public function getHighlight()
    {
        return $this->highlight;
    }

    /**
     * Set the value of highlight
     *
     * @return  self
     */ 
    public function setHighlight($highlight)
    {
        $this->highlight = $highlight;

        return $this;
    }

    /**
     * Get the value of sold_out
     */ 
    public function getSold_out()
    {
        return $this->sold_out;
    }

    /**
     * Set the value of sold_out
     *
     * @return  self
     */ 
    public function setSold_out($sold_out)
    {
        $this->sold_out = $sold_out;

        return $this;
    }

    /**
     * Get the value of rank
     */ 
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * Set the value of rank
     *
     * @return  self
     */ 
    public function setRank($rank)
    {
        $this->rank = $rank;

        return $this;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set the value of image
     *
     * @return  self
     */ 
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }
}