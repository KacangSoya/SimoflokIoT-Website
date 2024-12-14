<?php

if (isset($_GET['auth'])) {
    if ($_GET['auth'] == 'login') {
        include './pages/login.php';
    } elseif ($_GET['auth'] == 'resetpassword') {
        include './pages/password_reset.php';
    }
} else {
    include './pages/login.php';
}