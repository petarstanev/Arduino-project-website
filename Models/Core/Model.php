<?php

/**
 * Core class Model
 * Used by all models as a parent class.
 */
abstract class Model
{
    /**
     * @var database connection
     */
    protected $db;

    /**
     * Create a new instance of the database connection when we create the object.
     */
    public function __construct()
    {
        $this->db = new PDO('mysql:host=helios.csesalford.com;dbname=stb159_group7;charset=utf8', 'stb159', 'password01');

    }
}