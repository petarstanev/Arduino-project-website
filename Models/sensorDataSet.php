<?php

require_once ('Models/database.php');
require_once ('Models/sensorData.php');
require_once ('Models/sensorDataHFT.php');
require_once ('Models/sensorDataTemp.php');

class sensorDataSet {
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchAllSensors() {
        $sqlQuery = 'SELECT * FROM Sensors';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new sensorData($row);
        }
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


