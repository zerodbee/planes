<?php

require_once('classPlane.php');

class Airport
{
    private $planes;


    public function __construct()
    {
        $this->planes = [];
    }


    public function acceptPlane($plane)
    {
        if ($plane instanceof Plane) {
            $this->planes[] = $plane;
            echo $plane->getName() . " принят на аэропорт.";
        } else {
            echo "Неправильный тип самолета!";
        }
    }

    public function releasePlane($plane)
    {
        if (($key = array_search($plane, $this->planes, true)) !== false) {
            array_splice($this->planes, $key, 1);
            echo $plane->getName() . " освободил место и улетел.";
        } else {
            echo "Такого самолета нет на аэропорту!";
        }
    }

    public function parkPlane($plane)
    {
        echo $plane->getName() . " улетел на стоянку.";
    }

    public function prepareToTakeOff($plane)
    {
        echo $plane->getName() . " готовится взлетать.";
    }

    // Мои методы
    public function refuelPlane($plane)
    {
        echo $plane->getName() . " заправлен топливом.";
    }

    public function inspectPlane($plane)
    {
        echo $plane->getName() . " проходит технический осмотр.";
    }
}


$airport = new Airport();

$migPlane = new MigPlane("МИГ-29", 2000);
$tu154Plane = new Tu154Plane("ТУ-154", 900);

$airport->acceptPlane($migPlane);
$airport->acceptPlane($tu154Plane);

$migPlane->takeOff();
$migPlane->attack();
$migPlane->land();

$tu154Plane->takeOff();
$tu154Plane->land();

$airport->releasePlane($migPlane);
$airport->parkPlane($migPlane);

$airport->prepareToTakeOff($tu154Plane);
$airport->refuelPlane($tu154Plane);
$airport->inspectPlane($tu154Plane);

echo $tu154Plane->getName() . " статус: " . $tu154Plane->getStatus();

?>
