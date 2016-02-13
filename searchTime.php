<?php
/**
 * Created by PhpStorm.
 * User: stb472
 * Date: 21/01/16
 * Time: 14:36
 */

require_once("Models/SearchTime.php");
$view = new stdClass();
$view->pageTitle = 'Search via Time';

$searchTime = new SearchTime();

if(isset($_POST['search'])){
    $HFTresults = $searchTime->getHFTResults($_POST['startDate'], $_POST['endDate']);
    $tempResults = $searchTime->getTempResults($_POST['startDate'], $_POST['endDate']);

    $type = $_POST['type'];

    switch ($type) {
        case 'HFT':
            $results = $HFTresults;
            $view->result = $results;
        break;
        case 'Temp':
            $results = $tempResults;
            $view->result = $results;
        break;
        case 'All':
            $results = array_merge($HFTresults, $tempResults);
            $view->result = $results;
        break;
    }
}

require_once('Views/searchTime.phtml');