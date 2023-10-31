<?php

require_once('./app/Plane.php');

class Airport
{
    private $planes; // Агрегация объекта класса Plane


    public function __construct()
    {
        $this->planes = [];
    }


    public function acceptPlane($plane)
    {
        if ($plane instanceof Plane) {
            $this->planes[] = $plane;
            echo $plane->getName() . " принят на аэропорт.\n";
        } else {
            echo "Неправильный тип самолета!\n";
        }
    }
    
    public function createMigPlane($name, $maxSpeed)
    {
    	$plane = new MigPlane($name, $maxSpeed); // Композиция
    	$this->planes[] = $plane;
        echo $plane->getName() . " создан и принят на аэропорт.\n";
        
        return $plane;
    }
    
    public function createTu154PlanePlane($name, $maxSpeed)
    {
    	$plane = new Tu154Plane($name, $maxSpeed); // Композиция
    	$this->planes[] = $plane;
        echo $plane->getName() . " создан и принят на аэропорт.\n";
        
        return $plane;
    }

    public function releasePlane($plane)
    {
        if (($key = array_search($plane, $this->planes, true)) !== false) {
            array_splice($this->planes, $key, 1);
            echo $plane->getName() . " освободил место и улетел.\n";
        } else {
            echo "Такого самолета нет на аэропорту!\n";
        }
    }

    public function parkPlane($plane)
    {
        echo $plane->getName() . " улетел на стоянку.\n";
    }

    public function prepareToTakeOff($plane)
    {
        echo $plane->getName() . " готовится взлетать.\n";
    }
    
    public function refuelPlane($plane)
    {
        echo $plane->getName() . " заправлен топливом.\n";
    }

    public function inspectPlane($plane)
    {
        echo $plane->getName() . " проходит технический осмотр.\n";
    }
}

?>
