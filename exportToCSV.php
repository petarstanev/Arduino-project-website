<?php
require_once("Models/ExportToCSV.php");
$view = new stdClass();
$view->pageTitle = 'Export to CSV';

$exportToCSV = new ExportToCSV();

if (isset($_POST['export'])) {
    $exportToCSV->exportAll();
}else if(isset($_POST['exportHFT'])){
    $exportToCSV->exportHFT();
}else if(isset($_POST['exportTemp'])){
    $exportToCSV->exportTemp();
}

require_once('Views/exportToCSV.phtml');