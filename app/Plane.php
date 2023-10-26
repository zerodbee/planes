<?php

abstract class Plane { // Родительский класс
    protected $maxSpeed;
    protected $inAir;
    protected $name;

    public function __construct($name, $maxSpeed){
        $this->name = $name;
        $this->maxSpeed = $maxSpeed;
        $this->inAir = false;
    }

    public function takeOff(){
        $this->inAir = true;
        echo $this->name . " взлетает!" . "\n";
    }

    public function land(){
        $this->inAir = false;
        echo $this->name . " приземляется!" . "\n";
    }

    public function getStatus(){
        return $this->inAir ? "В воздухе" : "На земле" . "\n";
    }
    
    public function getName(){
        return $this->name;
    }
}

class MigPlane extends Plane { // Наследуемся от Plane
    public function attack(){
        echo $this->name . " атакует!" . "\n";
    }
}

class Tu154Plane extends Plane { } // Наследуемся от Plane, без дополнительных методов

?>
