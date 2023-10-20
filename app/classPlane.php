<?php
abstract class Plane {
    private $maxSpeed;
    private $inAir;
    protected $name;

    public function __construct($name, $maxSpeed){
        $this->name = $name;
        $this->maxSpeed = $maxSpeed;
        $this->inAir = false;
    }

    public function takeOff(){
        $this->inAir = true;
        echo $this->name . " взлетает!";
    }

    public function land(){
        $this->inAir = false;
        echo $this->name . " приземляется!";
    }

    public function getStatus(){
        return $this->inAir ? "В воздухе" : "На земле";
    }
    
    public function getName(){
        return $this->name;
    }
}

class MigPlane extends Plane {
    public function attack(){
        echo $this->name . " атакует!";
    }
}

class Tu154Plane extends Plane { }

$migPlane = new MigPlane("МИГ-29", 2000);
$migPlane->takeOff();
$migPlane->attack();
$migPlane->land();
$migPlane->getStatus();
echo "<br><br>";
$tu154Plane = new Tu154Plane("ТУ-154", 900);
$tu154Plane->takeOff();
$tu154Plane->land();
$tu154Plane->getStatus();

?>
