<?php
require_once("Models/Core/Model.php");
/**
 * Created by PhpStorm.
 * User: stb159
 * Date: 26/01/16
 * Time: 16:13
 */
class SearchTime extends Model
{
    var $startTime;
    var $endTime;
    var $result = '';

    public function getHFTResults($startTime, $endTime){
        $this->startTime = $startTime;
        $this->endTime = $endTime;

            $sqlQuery = "SELECT *
                        FROM Sensors
                        INNER JOIN HFT
                        ON HFT.fk_nodeID = Sensors.nodeID
                          WHERE (time_stamp BETWEEN '" . $this->startTime . "' AND '" . $this->endTime . "');";


            $this->result = $this->db->query($sqlQuery);

            return $dataSet = $this->result->fetchAll(PDO::FETCH_ASSOC);
            return $dataSet;
    }

    public function getTempResults($startTime, $endTime)
    {
        $this->startTime = $startTime;
        $this->endTime = $endTime;

        $sqlQuery = "SELECT *
                        FROM Sensors
                        INNER JOIN Temp
                        ON Temp.fk_nodeID = Sensors.nodeID
                          WHERE (time_stamp BETWEEN '" . $this->startTime . "' AND '" . $this->endTime . "');";


        $this->result = $this->db->query($sqlQuery);

        return $dataSet = $this->result->fetchAll(PDO::FETCH_ASSOC);
        return $dataSet;
    }
}