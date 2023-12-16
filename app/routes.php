<?php

$router->get("/", 'index.php');

// SONGS
$router->get("/songs", "songs/index.php");
$router->get("/song" , "songs/show.php");

$router->get("/song/create", "songs/create.php");
$router->post("/song/store", "songs/store.php");

$router->get("/song/edit", "songs/edit.php");
$router->put("/song/update", "songs/update.php");

$router->get("/song/delete", "songs/delete.php");
$router->delete("/song/destroy", "songs/destroy.php");


// ALBUMS
$router->get("/albums", "albums/index.php");
$router->get("/album" , "albums/show.php");

$router->get("/album/create", "albums/create.php");
$router->post("/album/store", "albums/store.php");

$router->get("/album/edit", "albums/edit.php");
$router->put("/album/update", "albums/update.php");

$router->get("/album/delete", "albums/delete.php");
$router->delete("/album/destroy", "albums/destroy.php");


// ARTISTS
$router->get("/artists", "artists/index.php");
$router->get("/artist" , "artists/show.php");

$router->get("/artist/create", "artists/create.php");
$router->post("/artist/store", "artists/store.php");

$router->get("/artist/edit", "artists/edit.php");
$router->put("/artist/update", "artists/update.php");

$router->get("/artist/delete", "artists/delete.php");
$router->delete("/artist/destroy", "artists/destroy.php");
