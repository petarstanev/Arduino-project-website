<?php
require_once("Models/ExportToCSV.php");
$view = new stdClass();
$view->pageTitle = 'Export to CSV';

$exportToCSV = new ExportToCSV();

if (isset($_POST['export'])) {
    $exportToCSV->export();

    $view->result;
}

require_once('Views/exportToCSV.phtml');