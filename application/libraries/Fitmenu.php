<?php

class Fitmenu{

    public function __get($attr){        
        $method = 'get'.ucFirst($attr);        
        return $this->$method();
    }

    public function __set($attr, $value){
        $method = 'set'.ucFirst($attr);
        $this->$method($value);
    }
    
    public function debug($var){
        echo "<h2>DEBUG :</h2>";
        echo "<pre>";
        print_r($var);
        echo "</pre>";        
    }


}
