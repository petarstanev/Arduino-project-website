<?php

require_once ('Models/database.php');
require_once ('Models/MovieData.php');

class MovieDataSet {
    protected $_dbHandle, $_dbInstance;

    public function __construct() {
        $this->_dbInstance = Database::getInstance();
        $this->_dbHandle = $this->_dbInstance->getdbConnection();
    }

    public function fetchAllMovies() {
        $sqlQuery = 'SELECT * FROM Movies';

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new MovieData($row);
        }
        return $dataSet;
    }

    public function fetchSingleMovie($movie_id){
        $sqlQuery = "SELECT * FROM Movies WHERE id_movie = '$movie_id'";

        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet[] = new MovieData($statement->fetch());
        return $dataSet;
    }

    public function fetchSingleMovieTitle($movie_title){
        $sqlQuery = "SELECT * FROM Movies WHERE title = '$movie_title'";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet[] = new MovieData($statement->fetch());
        return $dataSet;
    }

    public function fetchMovieGenre($movie_genre){
        $sqlQuery = "SELECT * FROM Movies WHERE genre = '$movie_genre'";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new MovieData($row);
        }
        return $dataSet;
    }

    public function fetchMovieDirector($movie_director){
        $sqlQuery = "SELECT * FROM Movies WHERE director_ID = '$movie_director'";
        $statement = $this->_dbHandle->prepare($sqlQuery); // prepare a PDO statement
        $statement->execute(); // execute the PDO statement

        $dataSet = [];
        while ($row = $statement->fetch()) {
            $dataSet[] = new MovieData($row);
        }
        return $dataSet;
    }
}


