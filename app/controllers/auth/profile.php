<?php 

if ($_SESSION['user']) {
    viewPage('/auth/profile');
} else {
    redirect('/');
}
