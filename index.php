<?php

require_once('./app/Airport.php');

$airport = new Airport();

$migPlane = new MigPlane("МИГ-29", 2000);
$migPlane->takeOff();
$migPlane->attack();
$migPlane->land();
$migPlane->getStatus();
$tu154Plane = new Tu154Plane("ТУ-154", 900);
$tu154Plane->takeOff();
$tu154Plane->land();
$tu154Plane->getStatus();

$tu154Plane2 = $airport->createTu154PlanePlane("ТУ-154 (2)", 900);
$migPlane2 = $airport->createMigPlane("МИГ-29 (2)", 2000);

$airport->acceptPlane($migPlane);
$airport->acceptPlane($tu154Plane);

$migPlane->takeOff();
$migPlane->attack();
$migPlane->land();

$migPlane2->takeOff();
$migPlane2->attack();
$migPlane2->land();

$tu154Plane->takeOff();
$tu154Plane->land();

$tu154Plane2->takeOff();
$tu154Plane2->land();

$airport->releasePlane($migPlane);
$airport->parkPlane($migPlane);

$airport->releasePlane($migPlane2);
$airport->parkPlane($migPlane2);

$airport->prepareToTakeOff($tu154Plane);
$airport->refuelPlane($tu154Plane);
$airport->inspectPlane($tu154Plane);

$airport->prepareToTakeOff($tu154Plane2);
$airport->refuelPlane($tu154Plane2);
$airport->inspectPlane($tu154Plane2);

echo $tu154Plane->getName() . " статус: " . $tu154Plane->getStatus() . "\n";

?>
