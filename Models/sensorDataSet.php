<?php
require_once("Models/Core/Model.php");


class SensorDataSet extends Model{
    var $results = '';

    public function fetchAllSensors() {
        $sqlQuery = 'SELECT * FROM Sensors';

        $this->results = $this->db->query($sqlQuery);

        return $dataSet = $this->results->fetchAll(PDO::FETCH_ASSOC);
        return $dataSet;
    }

    public function fetchHistoricalDataHFT($node_ID){
        $sqlQuery = "SELECT *
                        FROM Sensors
                        INNER JOIN HFT
                        ON HFT.fk_nodeID = Sensors.nodeID
                WHERE fk_nodeID = '$node_ID';";


        $this->results = $this->db->query($sqlQuery);
        return $dataSet = $this->results->fetchAll(PDO::FETCH_ASSOC);
        return $dataSet;
    }

    public function fetchHistoricalDataTemp($node_ID){
        $sqlQuery = "SELECT *
                        FROM Sensors
                        INNER JOIN Temp
                        ON Temp.fk_nodeID = Sensors.nodeID
                    WHERE fk_nodeID = '$node_ID';";

        $this->results = $this->db->query($sqlQuery);
        return $dataSet = $this->results->fetchAll(PDO::FETCH_ASSOC);
        return $dataSet;
    }
}


