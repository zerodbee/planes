<?php

require_once('./app/Plane.php');
require_once('./app/Airport.php');

$migPlane = new MigPlane("МИГ-29", 2000);
$migPlane->takeOff();
$migPlane->attack();
$migPlane->land();
$migPlane->getStatus();
$tu154Plane = new Tu154Plane("ТУ-154", 900);
$tu154Plane->takeOff();
$tu154Plane->land();
$tu154Plane->getStatus();

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

echo $tu154Plane->getName() . " статус: " . $tu154Plane->getStatus() . "\n";

?>
