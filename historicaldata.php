<?php


$view = new stdClass();
$view->pageTitle = 'Hisotorical Data';
session_start();

$_SESSION['node_id'] = $_GET['node_id'];

if($_GET['type']=="HFT"){
    { header('Location: dataHeatFlux.php'); }
} else{
    { header('Location: dataTemp.php'); }

}