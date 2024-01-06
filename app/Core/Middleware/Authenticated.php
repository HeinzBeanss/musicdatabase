<?php

namespace Core\Middleware;

class Authenticated {

    // makes sure they are signed in, otherwise certain pages/ctonrollers arent avaialble.
    public function handle() {
        echo "<script>console.log(\"SHOULD BE SIGNED IN\")</script>";
        if (! $_SESSION['user'] ?? false) {
            redirect('/');
        } 
    }

}