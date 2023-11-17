<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();

    include('../config/db.php');
    
    $sql = "SELECT Artists.artist_id, 
    Artists.name AS artist_name, 
    birthdate AS artist_birthdate, 
    Albums.album_id, 
    Albums.name AS album_name, 
    Albums.release_year AS album_release_year, 
    Albums.artist_id AS album_artist_id
    FROM Artists
    LEFT JOIN Albums ON Albums.artist_id = Artists.artist_id";

    // Result is the data returned from the query.
    $result = $conn->query($sql);

    // fetch_fields creates an array of each of the columns from the data queried
    // $fields = $result->fetch_fields();
    // foreach ($fields as $field) {
    //    echo $field->name . "<br>"; // This will output the name of each field/column
    // }

    // Retrieved the data in an array.
    $artistsArray = [];
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $artistsArray[] = $row;
        }
       } else {
        $artistsArray = ['message' => 'No artists found.'];
       }
       $conn->close();


    class Artist {

        // Object Properties (?)
        public $artist_id;
        public $artist_name;
        public $artist_birthdate;
        public $albums = [];

        // Object Functions
        // (The Constructor, to create a class when used.)
        public function __construct($id, $name, $birthdate) {
            $this->artist_id = $id;
            $this->artist_name = $name;
            $this->artist_birthdate = $birthdate;
        }

        // Add an album function
        public function AddAlbum($album) {
            $this->albums[] = $album;
        }
    }

    
    class Album {

        // Object Properties (?)
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


    // Use our classes to create a new array with our new objects!
    $artists_formatted = [];

    foreach ($artistsArray as $item) {
        $artistId = $item['artist_id'];

        if (!isset($artists_formatted[$artistId])) {
            // Not in the array, needs to be added, so we create a new artist object from the artist class, and put it in the array.
            $artists_formatted[$artistId] = new Artist($item['artist_id'], $item['artist_name'], $item['artist_birthdate']);
        }
            // Create the album object as well, put it into the $album variable
            $album = new Album($item['album_id'], $item['album_name'], $item['album_release_year'], $item['album_artist_id']);
            // Insert this album into the new Artist object, within the new array.
            $artists_formatted[$artistId]->AddAlbum($album);
        
    }

    // // Now to create a new array to restructure/organise the data.
    //    $organisedArray = [];
    //    foreach ($artistsArray as $artist) {
    //     $artistID = $artist->artist_id;

    //     // Check if it's already been added to the new array.
    //     if (!isset($organisedArray[$artistID])) {
    //         // It hasn't, so add the new artist to the organised array.
    //         $organisedArray[$artistID] = array(
    //             'artist_id' => $artist['artist_id'],
    //             'artist_name' => $artist['artist_name'],
    //             'artist_birthdate' => $artist['artist_birthdate'],
    //             'albums' => []            
    //         );
    //     }

    //     // It's already here, so add the album information to the artist's albums array
    //     $organisedArray[$artistID][$albums] =
       
    //    print_r($artistsArray[0]);
    //    echo '<br>';
    //    print_r($artistsArray[1]);
    //    echo '<br>';
    //    print_r($artistsArray[2]);
    //    echo '<br>';
    //    print_r($artistsArray[3]);
    //    echo '<br>';
    //    print_r($artistsArray[4]);
    //    echo '<br>';
    //    print_r($artistsArray[5]);
    //    echo '<br>';
    //    print_r($artistsArray[6]);
    //    echo '<br>';
    //    print_r($artistsArray[7]);
    //    echo '<br>';

    // print_r($artists_formatted[1]);
    // echo '<br>';
    // print_r($artists_formatted[2]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../styleee.css" rel="stylesheet">
    <title>Artists</title>
</head>
<body>
    <?php
    include('../includes/header.php');

    ?>

    <h2>Add an Artist</h2>
    <form action="../actions/create_artist.php" method="POST">
        <label for="artist_name">Artist Name:
            <input type="text" name="artist_name" id="artist_name" required>
        </label>

        <label for="artist_birthdate">Artist Birthdate:
            <input type="date" name="artist_birthdate" id="artist_birthdate" required>
        </label>

        <button>Add Artist</button>
    </form>

    <?php

    foreach($artists_formatted as $artist) {
        echo '<div class="container">';
        echo '<p class="artist-name">' . $artist->artist_name . '</p>';
        echo '<p class="data-info">' . $artist->artist_birthdate . '</p>';
        echo '<p class="data-info">' . "Albums: " . '</p>';
        foreach($artist->albums as $album) {
            echo '<p class="data-info">' . $album->album_name . '</p>';
            echo '<p class="data-info">' . $album->album_release_year . '</p>';
        }
        echo '<p class="data-info">' .'</p>';
        echo '</div>';
    }
    ?>
</body>
</html>