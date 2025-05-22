<?php
require __DIR__ . '/vendor/autoload.php';

use App\Service\Auth;
use App\Models\User;

$auth = new Auth();

$current_page = basename($_SERVER['PHP_SELF']);
if ($current_page === 'login_page.php') {
    if (!$auth->isLoggedIn()) {
        require 'login_page.php';
        exit();
    }
    header('Location: main.php');
    exit();
}
if ($current_page === 'main.php') {
    if ($auth->isLoggedIn()) {
        require 'main.php';
        exit();
    }
    header('Location: login_page.php');
    exit();
}
if (!$auth->isLoggedIn()) {
    header('Location: login_page.php');
    exit();
} else {
    header('Location: main.php');
    exit();
}
?>