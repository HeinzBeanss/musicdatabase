<?php

namespace Models;

class Album {

    public $album_id;
    public $album_name;
    public $album_release_year;
    public $album_artist_id;
    
    public function __construct($id, $name, $release_year, $artistId) {
        $this->album_id = $id;
        $this->album_name = $name;
        $this->album_release_year = $release_year;
        $this->album_artist_id = $artistId;
    }

}