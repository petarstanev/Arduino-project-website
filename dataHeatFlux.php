<?php

require_once('Models/sensorDataSet.php');
require_once('Models/sensorDataHFT.php');

$view = new stdClass();
$view->pageTitle = 'Hisotorical Data';
session_start();

$sensorData = new sensorDataSet();
$view->sensorData = $sensorData->fetchHistoricalDataHFT($_SESSION['node_id']);

require_once('Views/sensorInfoHeatFlux.phtml');