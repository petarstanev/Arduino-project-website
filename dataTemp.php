<?php

require_once('Models/sensorDataSet.php');
require_once('Models/sensorDataTemp.php');

$view = new stdClass();
$view->pageTitle = 'Hisotorical Data';
session_start();

$sensorData = new sensorDataSet();
$view->sensorData = $sensorData->fetchHistoricalDataTemp($_SESSION['node_id']);

require_once('Views/sensorInfoTemp.phtml');