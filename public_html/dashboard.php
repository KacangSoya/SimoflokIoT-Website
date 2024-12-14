<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['role'])) {
    header('Location: index.php');
    exit();
}

if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];

    if ($role === 'Admin') {
        $dashboard = './pages/admin_dashboard.php';
    } elseif ($role === 'User') {
        $dashboard = './pages/user_dashboard.php';
    } else {
        header('Location: auth.php');
        exit();
    }
   
    include $dashboard;
} else {
    header('Location: index.php');
    exit();
}
