<?php

//require_once ('Models/database.php');
//require_once ('Models/SensorData.php');
require_once("Models/Core/Model.php");
require_once ('Models/sensorDataHFT.php');
require_once ('Models/sensorDataTemp.php');

class SensorDataSet extends Model{
    var $results = '';

    public function fetchAllSensors() {
        $sqlQuery = 'SELECT * FROM Sensors';

        $this->results = $this->db->query($sqlQuery);

        return $dataSet = $this->results->fetchAll(PDO::FETCH_ASSOC);
        return $dataSet;
    }

    public function fetchHistoricalDataHFT($node_ID){
        $sqlQuery = "SELECT * FROM HFT WHERE fk_nodeID = '$node_ID'";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new sensorDataHFT($row);
        }
        return $dataSet;
    }

    public function fetchHistoricalDataTemp($node_ID){
        $sqlQuery = "SELECT * FROM Temp WHERE fk_nodeID = '$node_ID'";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new sensorDataTemp($row);
        }
        return $dataSet;
    }
}


