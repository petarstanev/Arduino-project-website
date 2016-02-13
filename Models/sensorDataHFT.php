<?php

class sensorDataHFT
{

    protected $_surface_temp, $_air_temp,$_heat_flux,$_time_stamp;

    public function __construct($dbRow)
    {
        $this->_air_temp = $dbRow['air_temp'];
        $this->_surface_temp = $dbRow['surface_temp'];
        $this->_heat_flux = $dbRow['heat_flux'];
        $date1 = str_replace("/", "-", $dbRow['time_stamp']);
        $this->_time_stamp = date('H:i:s d-m-Y ', strtotime($date1));
    }

    public function getSurfaceTemp()
    {
        return $this->_surface_temp;
    }

    public function getAirTemp()
    {
        return $this->_air_temp;
    }

    public function getheatFlux()
    {
        return $this->_heat_flux;
    }

    public function getTimeStamp()
    {
        return $this->_time_stamp;
    }
}


