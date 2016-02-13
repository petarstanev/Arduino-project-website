<?php

require_once('Models/SensorDataSet.php');

$view = new stdClass();
$view->pageTitle = 'Sensor Data';

$sensorDataSet = new SensorDataSet();
$results = $sensorDataSet->fetchAllSensors();
$view->results = $results;
require_once('Views/sensorData.phtml');
