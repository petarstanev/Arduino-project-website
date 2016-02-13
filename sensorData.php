<?php
require_once('Models/SensorDataSet.php');

$view = new stdClass();
$view->pageTitle = 'Sensor Data';
$sensorDataSet = new SensorDataSet();

if(!isset($_GET["node_id"])){
    $results = $sensorDataSet->fetchAllSensors();
    $view->results = $results;
    require_once('Views/sensorData.phtml');
}else{
    if(isset($_GET["type"])){
        if($_GET["type"] == "HFT"){
            $results = $sensorDataSet->fetchHistoricalDataHFT($_GET["node_id"]);
            $view->results = $results;
            require_once('Views/searchResults.phtml');
        }else{
            //temp
            $results = $sensorDataSet->fetchHistoricalDataTemp($_GET["node_id"]);
            $view->results = $results;
            require_once('Views/searchResults.phtml');
        }
    }
}

