<?php

namespace Core\Middleware;

class Guest {

    // makes sure they are signed out, otherwise certain pages/ctonrollers arent avaialble.
    public function handle() {
        echo "<script>console.log(\"SHOULDN'T BE SIGNED IN\")</script>";
        if ($_SESSION['user'] ?? false) {
            redirect('/');
        } 
    }
    
}