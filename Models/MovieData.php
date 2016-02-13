<?php

class MovieData {

    protected $_id, $_title, $_ageRating, $_year, $_genre, $_price_band, $_rented, $_director,$_movie_poster;

    public function __construct($dbRow) {
        $this->_id = $dbRow['id_movie'];
        $this->_title = $dbRow['title'];
        $this->_ageRating = $dbRow['age_rating'];
        $this->_year= $dbRow['year'];
        $this->_genre = $dbRow['genre'];
        $this->_price_band= $dbRow['price_band'];
        if($dbRow['price_band'] == 'A'){
            $this->_price_band='£3.50';
        } elseif($dbRow['price_band'] == 'B'){
            $this->_price_band='£2.50';
        } else {
            $this->_price_band='£1.00';
        }


        if($dbRow['rented'] = 'NULL'){
            $this->_rented='Avaliable';
        } else {
            $this->_rented='Not Avaliable';
        }

        $this->_director = $dbRow['director_ID'];
        $this->_movie_poster= $dbRow['movie_poster'];
    }

    public function getMovieID() {
        return $this->_id;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function getAgeRating() {
        return $this->_ageRating;
    }

    public function getGenre() {
        return $this->_genre;
    }

    public function getDirector() {
        return $this->_director;
    }

    public function getMoviePoster() {
        return $this->_movie_poster;
    }

    public function getMovieYear() {
        return $this->_year;
    }

    public function getPriceBand() {
        return $this->_price_band;
    }

    public function getRented() {
        return $this->_rented;
    }
}


