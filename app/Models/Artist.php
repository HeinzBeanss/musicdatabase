<?php

namespace Models;

class Artist {

    public $artist_id;
    public $artist_name;
    public $artist_birthdate;
    public $albums = [];

    public function __construct($id, $name, $birthdate) {
        $this->artist_id = $id;
        $this->artist_name = $name;
        $this->artist_birthdate = $birthdate;
    }

    public function AddAlbum($album) {
        $this->albums[] = $album;

    }
}