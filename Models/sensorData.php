<?php

class sensorData
{

    protected $_id, $_sensor_type, $_sensor_name;

    public function __construct($dbRow)
    {
        $this->_id = $dbRow['nodeID'];
        $this->_sensor_type = $dbRow['sensor_Type'];
        $this->_sensor_name = $dbRow['sensor_Name'];
    }

    public function getNodeID()
    {
        return $this->_id;
    }

    public function getSensorType()
    {
        return $this->_sensor_type;
    }


    public function getSensorName()
    {
        return $this->_sensor_name;
    }
}


