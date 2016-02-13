<?php

require_once('Models/sensorDataSet.php');

$view = new stdClass();
$view->pageTitle = 'Sensor Data';

$sensorDataSet = new sensorDataSet();
$view->sensorDataSet = $sensorDataSet->fetchAllSensors();

require_once('Views/sensorData.phtml');
