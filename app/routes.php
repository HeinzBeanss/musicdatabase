<?php

$router->get("/", 'index.php');

// AUTH
$router->get("/login", "auth/login.php");
$router->post("/login", "auth/login-post.php");

$router->get("/signup", "auth/signup.php");
$router->post("/signup", "auth/signup-post.php");

$router->get("/logout", "auth/logout.php");

$router->get("/profile", "auth/profile.php");

// SONGS
$router->get("/songs", "songs/index.php");
$router->get("/song" , "songs/show.php");

$router->get("/songs/create", "songs/create.php");
$router->post("/songs/store", "songs/store.php");

$router->get("/songs/edit", "songs/edit.php");
$router->put("/songs/update", "songs/update.php");

// $router->get("/songs/delete", "songs/delete.php");
$router->delete("/songs/destroy", "songs/destroy.php");


// ALBUMS
$router->get("/albums", "albums/index.php");
$router->get("/album" , "albums/show.php");

$router->get("/albums/create", "albums/create.php");
$router->post("/albums/store", "albums/store.php");

$router->get("/albums/edit", "albums/edit.php");
$router->put("/albums/update", "albums/update.php");

// $router->get("/albums/delete", "albums/delete.php");
$router->delete("/albums/destroy", "albums/destroy.php");


// ARTISTS
$router->get("/artists", "artists/index.php");
$router->get("/artist" , "artists/show.php");

$router->get("/artists/create", "artists/create.php");
$router->post("/artists/store", "artists/store.php");

$router->get("/artists/edit", "artists/edit.php");
$router->put("/artists/update", "artists/update.php");

// $router->get("/artists/delete", "artists/delete.php");
$router->delete("/artists/destroy", "artists/destroy.php");
